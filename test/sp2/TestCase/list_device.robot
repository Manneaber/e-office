*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
${BROWSER}    Chrome
${DELAY}    0.1

*** Test Cases ***

TC01 Open Browser Device
	Set Selenium Speed    ${DELAY}
	Open Browser    ${URL}    ${BROWSER}
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		รายการ
	Page Should Contain		แก้ไข
	Page Should Contain		ลบ
	Close Browser


TC02 Click Add Device
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		ชื่ออุปกรณ์
	Close Browser

TC03 Click Edit Device
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr/td[2]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		ชื่ออุปกรณ์
	Close Browser


TC4 Delete Device
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr/td[3]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		คุณต้องการลบอุปกรณ์หรือไม่ ?
	Click Element	xpath= /html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div[3]/button[2]
	Close Browser

TC4 No Delete Device
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div/table/tbody/tr/td[3]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/device/01
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		คุณต้องการลบอุปกรณ์หรือไม่ ?
	Click Element	xpath= /html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div[3]/button[2]
	Close Browser



