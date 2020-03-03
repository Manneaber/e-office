*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype	
${BROWSER}    Chrome
${DELAY}    0.1

*** Test Cases ***

TC01 Valid Add List_Type
	Open Browser    ${URL}    ${BROWSER}
	set Selenium speed		${DELAY}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Input text  type_id		01
	Input text  type_name	Device Iphone 8
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div/div[2]/form/div[3]/button[2]
	Handle Alert			# Dismiss Alert.
	Page Should Contain		01
	Page Should Contain		Device Iphone 8
	Close Browser


TC02 Add List_Type Input ภาษาไทย
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Input text  type_id		ครุภัณฑ์ที่1
	Input text  type_name	ไอโฟน 8 พลัส
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div/div[2]/form/div[3]/button[2]
	Page Should be		Please match the requested format.
    Close Browser


TC03 Add List_Type ไม่ Input รหัส
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์	
	Input text  type_name	Iphone 7
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div/div[2]/form/div[3]/button[2]
    Page Should Contain    Please fill out this field.
	Close Browser


TC04 Add List_Type ไม่ Input ชื่อ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Input text  type_id		02	
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div/div[2]/form/div[3]/button[2]
    Page Should Contain    Please fill out this field.
	Close Browser   


TC05 Add List_Type ไม่ Input ทั้งรหัสและชื่อ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div/div[2]/form/div[3]/button[2]
    Page Should Contain    Please fill out this field.
	Close Browser


TC06 Add List_Type ชื่อเป็นตัวอักษรพิเศษ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Input text  type_id		03   
	Input text  type_name	!#*Phone 
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div/div[2]/form/div[3]/button[2]
    Handle Alert			# Dismiss Alert.
	Page Should Contain		03
	Page Should Contain		!#*Phone
	Close Browser


TC7 Add List_Type รหัสซ้ำ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Input text  type_id		03
	Input text  type_name	!#*Phone 
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div/div[2]/form/div[3]/button[2]
    Handle Alert			# Dismiss Alert.
	Page Should Not Contain		!#*Phone 
	Close Browser

TC8 Add List_Type ชื่อซ้ำ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
	Page Should Contain		ประเภทของครุภัณฑ์
	Page Should Contain		เพิ่มประเภทของครุภัณฑ์
	Page Should Contain		รหัสประเภทของครุภัณฑ์
	Input text  type_id		08   
	Input text  type_name	Device Iphone 8 
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div/div[2]/form/div[3]/button[2]
    Handle Alert			# Dismiss Alert.
	Page Should Contain		08
	Page Should Contain		Device Iphone 8 
	Close Browser

TC9 Delete List_Type
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/a[2]
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
    Page Should Contain		ประเภทของครุภัณฑ์
    Page Should Not Contain     Device Iphone 8  
    Close Browser

TC10 NO Delete List_Type
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/div[3]/div[1]/div/div/a[2]
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/showtype
    Page Should Contain		ประเภทของครุภัณฑ์
    Page Should Not Contain     Device Iphone 8  
    Close Browser