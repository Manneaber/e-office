*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
${Pic}	
${BROWSER}    Chrome
${DELAY}    0.5

*** Test Cases ***

TC01 Open Browser
	Set Selenium Speed    ${DELAY}
	Open Browser    ${URL}    ${BROWSER}
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		แก้ไข
	Page Should Contain		ลบ
	Close Browser


TC02 Click Edit
	Open Browser    ${URL}    ${BROWSER}
	Click Element	edit
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		แก้ไข
	Page Should Contain		ลบ
	Close Browser
	
	
TC03 Click Add Equipment
	Open Browser    ${URL}    ${BROWSER}
	Click Element	Addequipment
	Location Should Be		http://localhost/Sprint1.1/web/Showlist/addsub?id=0
	Page Should Contain		Show list
	Page Should Contain		Maintenance
	Page Should Contain		Add Computer equipment
	Page Should Contain		Computer equipment
	Close Browser
	
	
TC04 Click Delete row 1
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/table/tbody/tr[1]/td[5]/a
	Location Should Be		http://localhost/Sprint1.1/web/Showlist/deletesub/1
	Page Should Contain		A Database Error Occurred
	Close Browser


TC05 Click Delete Other row1
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/table/tbody/tr[2]/td[5]/a
	Location Should Be		http://localhost/Sprint1.1/web/Showlist?typeid=0
	Page Should Contain		Show list
	Page Should Contain		Maintenance
	Page Should Contain		Computer equipment
	Page Should Contain		Show list data
	Close Browser
	
	
TC06 Click View List
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/table/tbody/tr[1]/td[6]/a
	Location Should Be		http://localhost/Sprint1.1/web/Showlist/list/1
	Page Should Contain		Show list
	Page Should Contain		Maintenance
	Page Should Contain		Computer equipment    
	${result}	Get text	xpath= /html/body/div/h4
	Should Be Equal			${result}	${expect}
	Close Browser

TC07 Click Back
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div/div/a[2]
	Location Should Be		http://localhost/Sprint1.1/web/
	Page Should Contain		Show list
	Page Should Contain		Maintenance
	Page Should Contain		Computer equipment
	Page Should Contain		Add Type
	Close Browser
	
