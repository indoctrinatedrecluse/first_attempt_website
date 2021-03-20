©2019 Abhishek Mitra.

#### About :
This is intended to be a store and retrive database manager coupled with browser UI for managing articles submitted to a file hosting server. Queries are possible, and output is available as pdf if necessary. Uses html, PHP, MySQL, jQuery, JavaScript, CSS, MD5 Checksum generator, Signature Verifier, Installer and initializer scripts.

#### Pre-Requisities:
1) A web server, either a remote file hosting server, or a locally based server emulator service like Apache.
2) Any web browser that supports at least html5 rendering and pdf formats in-application.
3) MySQL support, through standalone installation or xampp.

#### Notes :
1) If one is using manually configures Apache, one must ensure that php is specifically configured as an apache module for the scripting services to run correctly.
2) The batch files might generate checksum error warnings or antivirus warnings. If so, ignore them. All files have been checked using the QuickHeal FileSafety engine.
3) For manual sql installation, sql modules must be configured to work with php. Most php installers handle this by default.
4) To check file integrity, open the MD5 checksum file with the attached exe. Note that the default configuration does not check directory substructure integrity.

#### Troubleshooting :
1) If the url scripts do not work, please manually copy the "scripts" folder, which is present inside the programme installation folder, something like "C://Users/name/Documents/mini project/", to the htdocs folder of local engine. This would look like "C://Apache/htdocs/"
2) If the pdfs generated are mis-scaled, try zooming out of the webpage or right click and view source, then adjust scales manually.
3) Sometimes filesystem errors will prevent download link generation for existing articles. Refreshing the webpage may resolve this error. This bug is not completely fixed yet.
4) The bat file for initialization is largely dependent on system path abbreviation settings and might be needed to be configured manually using the steps described above.

#### Known issues :
1) Due to limitations in the pdf generating extension used, which is purely php-based, it is difficult to include download links in the pdf itself, so download links are given on the webpage itself, while pdfs are configured by default to open in new windows, which should not interfere with the session/cookies being used.
2) The msi/exe installer is created with a library which is still under development, so the bat files in the installation folders may be manually run just in case.
3) Despite the data hiding measures taken, Firefox Quantum and Internet Explorer 11 still show parts of the source code through manual url redirect. This issue is not fixed as of yet and may be worked on in a future update.

#### Current status :
This project was evaluated at an intermediate stage and subsequently abandoned. I do intend to make improvements, expansions and debug and complete the existing code here at some point, but at the moment it serves as a buggy first attempt at making a website with html, php, some bootstrap, styles, sql, and so on.
