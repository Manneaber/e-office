*** Settings ***
Library    SeleniumLibrary
	
*** Variables ***
${SEVER}		localhost:8080
${EDIT PAGE}    http://127.0.0.1/webTest/web/insertdata/edit/1		
${BROWSER}    	chrome
	
*** Test Cases ***

Go To Edit page

    Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Close Browser
	
	
Input Name Type Status #TC1

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Input Text		devicesub_name		test
	Select From List By Label    devicesub_type 	Mobile Phone		
	Select From List By Label    devicesub_rentable 	False
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	

TC2

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Input Text		devicesub_name		test
	Select From List By Label    devicesub_type 	Mobile Phone		
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
TC3

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	Input Text		devicesub_name		test
			
	Select From List By Label    devicesub_rentable 	False
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser


TC4

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
			
	Select From List By Label    devicesub_rentable 	False
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
TC5

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	Select From List By Label    devicesub_type 	Mobile Phone		
	Select From List By Label    devicesub_rentable 	False
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
TC6

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	Select From List By Label    devicesub_type 	Mobile Phone		
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser	

TC7

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
			
	Select From List By Label    devicesub_rentable 	False
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser	
	
TC8

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
TC9

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	Select From List By Label    devicesub_type 	Mobile Phone		
	Select From List By Label    devicesub_rentable 	False
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
TC10

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	Select From List By Label    devicesub_type 	Mobile Phone		
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
	
TC11

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
			
	Select From List By Label    devicesub_rentable 	False
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
TC12

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
TC13

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	
	
	Click Button	submit
	Location Should Be				http://127.0.0.1/webTest/web/Insertdata/editdata
	Wait Until Page Contains		update success
	Close Browser
	
TC14

	Open Browser 	 ${EDIT PAGE} 	${BROWSER}
	

	Click Element		xpath=//*[@class="btn btn-dark"] element locator xpath 	
	Location Should Be				http://127.0.0.1/webTest/web/
	
	Close Browser