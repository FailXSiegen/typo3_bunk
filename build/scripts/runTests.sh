#!/usr/bin/env bash
# TYPO3 core test runner based on docker and docker-compose.

# Function to write a .env file in Build/testing-docker
setUpDockerComposeDotEnv() {
  [ -e .env ] && rm .env
  echo "ROOT_DIR=${ROOT_DIR}" >>.env
  echo "EXTRA_TEST_OPTIONS=${EXTRA_TEST_OPTIONS}" >>.env
  echo "HOST_USER=${USER}" >>.env
  echo "HOST_HOME=${HOME}" >>.env
  echo "HOST_UID=$(id -u)" >>.env
}

# Function to get the real path on mac os.
realpath() {
  if ! pushd $1 &>/dev/null; then
    pushd ${1##*/} &>/dev/null
    echo $(pwd -P)/${1%/*}
  else
    pwd -P
  fi
  popd >/dev/null
}

# Load help text into $HELP
read -r -d '' HELP <<EOF
Test runner.

Usage: $0 [options] [file]

Options:
    -s <...>
        Specifies which test suite to run
            - acceptance: acceptance tests
            - side-runner: Runs the selenium side runner.

    -e "<test options>"
        Only with -s acceptance
        Additional options to send to codeception tests.

    -h
        Show this help.

Examples:
    build/scripts/runTests.sh -s acceptance
    build/scripts/runTests.sh -s acceptance -e tests/Acceptance/SigninCest
    build/scripts/runTests.sh -s side-runner
EOF

# Test if docker-compose exists, else exit out with error
if ! type "docker-compose" >/dev/null; then
  echo "This script relies on docker and docker-compose. Please install" >&2
  exit 1
fi

# Go to the directory this script is located, so everything else is relative
# to this dir, no matter from where this script is called.
THIS_SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" >/dev/null && pwd)"
cd "$THIS_SCRIPT_DIR" || exit 1

# Go to directory that contains the local docker-compose.yml file
cd ../testing-docker || exit 1

# Option defaults
ROOT_DIR=$(realpath $PWD"/../..")
TEST_SUITE="acceptance"
EXTRA_TEST_OPTIONS=""

# Option parsing
# Reset in case getopts has been used previously in the shell
OPTIND=1
# Array for invalid options
INVALID_OPTIONS=()
# Simple option parsing based on getopts (! not getopt)
while getopts ":s:d:p:e:xy:huv" OPT; do
  case ${OPT} in
  s)
    TEST_SUITE=${OPTARG}
    ;;
  e)
    EXTRA_TEST_OPTIONS=${OPTARG}
    ;;
  h)
    echo "${HELP}"
    exit 0
    ;;
  \?)
    INVALID_OPTIONS+=(${OPTARG})
    ;;
  :)
    INVALID_OPTIONS+=(${OPTARG})
    ;;
  esac
done

# Exit on invalid options
if [ ${#INVALID_OPTIONS[@]} -ne 0 ]; then
  echo "Invalid option(s):" >&2
  for I in "${INVALID_OPTIONS[@]}"; do
    echo "-"${I} >&2
  done
  echo >&2
  echo "${HELP}" >&2
  exit 1
fi

# Suite execution
case ${TEST_SUITE} in
acceptance)
  setUpDockerComposeDotEnv
  docker-compose run acceptance
  SUITE_EXIT_CODE=$?
  docker-compose down
  ;;
side-runner)
  setUpDockerComposeDotEnv
  docker-compose run selenium_side_runner
  SUITE_EXIT_CODE=$?
  docker-compose down
  ;;
*)
  echo "Invalid -s option argument ${OPTARG}" >&2
  echo >&2
  echo "${HELP}" >&2
  exit 1
  ;;
esac

exit $SUITE_EXIT_CODE
