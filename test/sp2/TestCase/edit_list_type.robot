*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype	
${BROWSER}    Chrome
${DELAY}    0.1

*** Test Cases ***

TC01 Valid Edit List_Type
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		แก้ไขประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Clear Element Text  	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[2]/textarea
	Input text  type_name	Device Iphone 8
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[3]/button[2]
    Page Should Contain		updated data success
	Close Browser

TC02 Edit List_Type Input อักษรพิเศษ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		แก้ไขประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Clear Element Text  	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[2]/textarea
	Input text  type_name	.#*!.Phone 
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[3]/button[2]
	Page Should Contain		updated data success
    Close Browser

TC03 Edit List_Type ไม่ Input ชื่อ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		แก้ไขประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Clear Element Text  	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[2]/textarea
    Input text  type_name	 	
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[3]/button[2]
    Page Should Contain    Please fill out this field.
	Close Browser

TC04 Edit List_Type ตัวอักษรภาษาไทย
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		แก้ไขประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Clear Element Text  	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[2]/textarea
    Input text  type_name   ไอโฟน13พลัส
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[3]/button[2]
    Page Should Contain    updated data success
	Close Browser   


TC05 Edit List_Type Input ซ้ำ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		แก้ไขประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Clear Element Text  	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[2]/textarea
    Input text  type_name   ไอโฟน13พลัส
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[3]/button[2]
    Page Should Contain     ไม่สำเร็จ
	Close Browser

TC06 Edit List_Type ชื่อเป็นตัวเลข
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		แก้ไขประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Clear Element Text  	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[2]/textarea
	Input text  type_name	12345678910
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div[1]/div/div/div/div/div/div[2]/form/div[3]/button[2]
    Page Should Contain    updated data success
	Close Browser


