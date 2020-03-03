*** Settings ***
Library    SeleniumLibrary
	
*** Variables ***
${SEVER}		localhost:8080
${EDIT PAGE}    http://127.0.0.1/webTest/web/showlist/adddevice		
${BROWSER}    	chrome
	
*** Test Cases ***

Go To Edit page

    Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Location Should Be		${EDIT PAGE}
	Close Browser
	
TC1

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Input Text		deviceid		20
			
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/index.php/Showlist/list/1
	Close Browser
	
TC2

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
			
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/showlist/adddevice
	Close Browser
	
TC3

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
			
	
	Click Link		xpath=//html/body/div/a[text()='Back']
	Location Should Be				http://127.0.0.1/webTest/web/showlist/list/1
	Close Browser
	
TC4

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Input Text		deviceid		15
			
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/index.php/Showlist/list/1
	Close Browser
	

	