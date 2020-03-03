*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01	
${BROWSER}    Chrome
${DELAY}    0.1

*** Test Cases ***

TC01 Valid Add Device_List
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr[1]/td[2]/button/img
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		ชื่ออุปกรณ์
	Input text  sub_name    Device Iphone 8
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div/div/div[2]/form/div[2]/button[2]
    Page Should Contain		Device Iphone 8
    Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Close Browser

TC02 Add Device_List Input อักษรพิเศษ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr[1]/td[2]/button/img
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		ชื่ออุปกรณ์
	Input text  sub_name	.#*!.Phone 
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div/div/div[2]/form/div[2]/button[2]
	Page Should Contain		.#*!.Phone
    Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
    Close Browser

TC03 Add Device_List ไม่ Input ชื่อ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr[1]/td[2]/button/img
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		ชื่ออุปกรณ์	 	
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div/div/div[2]/form/div[2]/button[2]
    Page Should Contain    Please fill out this field.
    Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Close Browser

TC04 Add Device_List ตัวอักษรภาษาไทย
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr[1]/td[2]/button/img
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		ชื่ออุปกรณ์
    Input text  sub_name   ไอโฟน13พลัส
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div/div/div[2]/form/div[2]/button[2]
    Page Should Contain    ไอโฟน13พลัส
    Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Close Browser   


TC05 Add Device_List Input ซ้ำ
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr[1]/td[2]/button/img
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		ชื่ออุปกรณ์
    Input text  sub_name   ไอโฟน13พลัส
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div/div/div[2]/form/div[2]/button[2]
    Page Should Contain     ไม่สำเร็จ
    Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Close Browser

TC06 Add Device_List ชื่อเป็นตัวเลข
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr[1]/td[2]/button/img
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		ชื่ออุปกรณ์
	Input text  sub_name	12345678910
	Click Element	xpath=/html/body/div[1]/div[2]/div[2]/div/div/div[3]/div/div/div[2]/form/div[2]/button[2]
    Page Should Contain     12345678910
    Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Close Browser


