*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype	
${BROWSER}    Chrome
${DELAY}    0.5

*** Test Cases ***

TC01 Open Browser List_Type
	Set Selenium Speed    ${DELAY}
	Open Browser    ${URL}    ${BROWSER}
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		แก้ไข
	Page Should Contain		ลบ
	Close Browser


TC02 Click Add List_Type
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Page Should Contain		ประเภทของครุภัณฑ์
	Close Browser

TC03 Click Edit List_Type
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
    Page Should Contain	    แก้ไขประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Page Should Contain		ประเภทของครุภัณฑ์
	Close Browser


TC4 Delete List_Type
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/a[2]
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
    Page Should Contain		ประเภทของครุภัณฑ์
    Close Browser