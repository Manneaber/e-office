*** Settings ***
Library    SeleniumLibrary
	
*** Variables ***
${SEVER}		localhost:8080
${EDIT PAGE}    http://127.0.0.1/webTest/web/showlist/editdevice/1		
${BROWSER}    	chrome
	
*** Test Cases ***

Go To Edit page

    Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Location Should Be		${EDIT PAGE}
	Close Browser
	
TC1
	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	Select From List By Label    device_status 	Rentable		
	Select From List By Label    device_lock 	Lock
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/index.php/Showlist/list/1
	Close Browser
	
TC2
	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	Select From List By Label    device_status 	Rentable		
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/index.php/Showlist/list/1
	Close Browser
	
TC3
	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
			
	Select From List By Label    device_lock 	Lock
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/index.php/Showlist/list/1
	Close Browser
	
TC4
	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/index.php/Showlist/list/1
	Close Browser
	
TC5
	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/index.php/Showlist/list/1
	Close Browser
	
TC6
	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	
	Click Link		href=http://127.0.0.1/webTest/web/showlist/list/1
	Location Should Be				http://127.0.0.1/webTest/web/index.php/Showlist/list/1
	Close Browser
	