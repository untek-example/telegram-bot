#!/bin/sh
cd ../../vendor/untek-utility/init/bin
sudo php console init --config={{ROOT_DIRECTORY}}/resources/environments/config.php
#sudo php console init --overwrite=All --config={{ROOT_DIRECTORY}}/resources/environments/config.php
