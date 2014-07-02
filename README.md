# phpBB Google Analytics Extension

This is the repository for the development of the phpBB Google Analytics Extension.

[![Build Status](https://travis-ci.org/phpbb-extensions/googleanalytics.png)](https://travis-ci.org/phpbb-extensions/googleanalytics)

## Quick Install
You can install this on the latest copy of the develop branch ([phpBB 3.1-dev](https://github.com/phpbb/phpbb3)) by following the steps below:

1. [Download the latest release](https://github.com/phpbb-extensions/googleanalytics/releases).
2. Unzip the downloaded release, and change the name of the folder to `googleanalytics`.
3. In the `ext` directory of your phpBB board, create a new directory named `phpbb` (if it does not already exist).
4. Copy the `googleanalytics` folder to `phpBB/ext/phpbb/` (if done correctly, you'll have the main extension class at (your forum root)/ext/phpbb/googleanalytics/ext.php).
5. Navigate in the ACP to `Customise -> Manage extensions`.
6. Look for `Google Analytics` under the Disabled Extensions list, and click its `Enable` link.
7. Set up and configure Google Analytics by navigating in the ACP to `Extensions` -> `Google Analytics`.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Google Analytics` under the Enabled Extensions list, and click its `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/phpbb/googleanalytics` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)
