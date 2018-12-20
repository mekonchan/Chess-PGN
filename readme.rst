# Creating Web-based App for Human Skills Estimation at Chess using Heuristic-Search Based Engines

This project attempts to ease user to assess their chess skill. This is because there are a few websites that can 
determine chess player’s strength. But, the process is troubling as it needs the user simulate their own move when 
given several circumstances; This is time-consuming and not efficient. Thus, this project is developed to counter 
those problems and ease the users more.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them
- Xampp Server
- Internet Browser (Chrome, Mozilla Firefox, etc)

Installing Xampp Server
```
1. Download the installer file at (https://www.apachefriends.org/download.html) for the latest version of XAMPP, and save the file to your computer.
2. Next, you need to open the folder where you saved the file, and double-click the installer file.
3. You will be prompted to select the language you wish to use in XAMPP. Click the arrow in the dropdown box, select your language in the list, then click OK to continue the installation process.
4. For Windows 7 users, you will see a window pop up, warning you about User Account Control (UAC) being active on your system. Click OK to continue the installation.
5. Next you will see the Welcome To The XAMPP Setup Wizard screen. Click Next to continue the installation.
6. The Choose Components screen will appear next. This screen will allow you to choose which components you would like to install. To run XAMPP properly, all components checked need to be installed. Click Next to continue.
7. Next you will see the Choose Install Location screen. Unless you would like to install XAMPP on another drive, you should not need to change anything. Click Install to continue.
8. XAMPP will begin extracting files to the location you selected in the previous step.
9. Once all of the files have been extracted, the Completing The XAMPP Setup Wizard screen will appear. Click Finishto complete the installation.
10.The Installation Complete screen will now appear. Click Finish to begin using XAMPP.
11.After clicking Finish in the previous screen, you will be asked if you want to open the XAMPP Control Panel. Click Yes.
```
Installing Chrome
```
1. Download the installation file.
2. If prompted, click Run or Save.
3. If you chose Save, double-click the download to start installing.
4. Start Chrome:
   - Windows 7: A Chrome window opens once everything is done.
   - Windows 8 & 8.1: A welcome dialog appears. Click Next to select your default browser.
   - Windows 10: A Chrome window opens after everything is done. You can make Chrome your default browser.
```

### Running the website

A step by step series of examples that tell you how to get the website running

1. Find the zip file Chess-PGN in the CD. Extract it and then rename the folder to Chess.
2. Go to Xampp directory, located in the C: drive as per installation destination.
3. Click the Xampp folder and then find htdocs folder.
4. After you find the htdocs fodler, copy our project file Chess into the htdocs folder.
5. Starting Xampp #
6. To start Apache or MySQL manually, click the Start button under Actions next to that module (Apache and MySQL).
7. You can close or minimize the Xampp Control Panel window. (Don't worry, It will run in the background)
8. Open up your Internet Browser. (Chrome, Mozilla Firefox, etc)
9. Search the web. (http://localhost/Chess)
10.The website is now deployed!

## Test the website

1. Click choose file button. Choose a PGN file.
2. Then, click upload button.
3. Wait for a couple of minutes for the website to finish loading and your score is shown.


## Built With

* [CodeIgniter Framework](https://codeigniter.com/docs) - The web framework used
* [Composer](https://getcomposer.org/doc/) - Dependency Management
* [Sublime Text 3](https://www.sublimetext.com/docs/3/) - Code Editor
* [Stockfish 10](https://github.com/official-stockfish/Stockfish) - Chess engine

## Authors

* **Muhammad Akmal Hakim bin Mohd Zuki** - *Initial work* - [Chess-PGN](https://github.com/mekonchan/Chess-PGN)

## Acknowledgments

* jhlywa/chess.js
* oakmac/chessboardjs
* Siti Sholiha
