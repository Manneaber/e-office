*** Settings ***
Library    SeleniumLibrary
	
*** Variables ***
${SEVER}		localhost:8080
${EDIT PAGE}    http://127.0.0.1/webTest/web/	
${BROWSER}    	chrome
	
*** Test Cases ***

Go To Edit page

    Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Location Should Be		${EDIT PAGE}
	Close Browser

TC1

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	Click Button		xpath=//html/body/div/table/tbody/tr/td[5]/button[text()='Delete']
	Click Button 		xpath=//html/body/div/div/div/div[3]/button[text()='Yes']
	
	Close Browser