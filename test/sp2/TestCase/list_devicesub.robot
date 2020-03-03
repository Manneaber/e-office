*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/devicesub/9
${BROWSER}    Chrome
${DELAY}    0.1

*** Test Cases ***

TC01 Open Browser Device
	Set Selenium Speed    ${DELAY}
	Open Browser    ${URL}    ${BROWSER}
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/devicesub/9
	Page Should Contain		เพิ่มครุภัณฑ์ใหม่
	Page Should Contain		รหัสครุภัณฑ์	
    Page Should Contain	    ลักษณะ	
    Page Should Contain	    สถานะการยืม	
    Page Should Contain	    สิทธิการยืม	
    Page Should Contain	    ตำแหน่งที่ตั้ง	
    Page Should Contain	    หมายเหตุ	
    Page Should Contain	    การจัดการ
	Close Browser


TC02 Click Add Device
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div[1]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/devicesub/9
	Page Should Contain		เพิ่มครุภัณฑ์ใหม่
	Page Should Contain		รหัสครุภัณฑ์	
    Page Should Contain	    คุณสมบัติครุภัณฑ์
    Page Should Contain	    ตำแหน่งที่ตั้ง
    Page Should Contain	    หมายเหตุ	
    Page Should Contain	    สถานะการยืม	
    Page Should Contain	    สิทธิการยืม	
	Close Browser

TC03 Click Edit Device
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div[1]/table/tbody/tr/td[6]/button
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/devicesub/9
    แก้ไขครุภัณฑ์
    Page Should Contain	    คุณสมบัติครุภัณฑ์
    Page Should Contain	    ตำแหน่งที่ตั้ง
    Page Should Contain	    หมายเหตุ	
    Page Should Contain	    สถานะการยืม	
    Page Should Contain	    สิทธิการยืม	
	Close Browser


TC4 Delete Device
	Open Browser    ${URL}    ${BROWSER}
	Click Element	xpath= /html/body/div/div[2]/div[2]/div/div[1]/table/tbody/tr/td[6]/a
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/devicesub/9
	Page Should Contain		เพิ่มอุปกรณ์
	Page Should Contain		คุณต้องการลบอุปกรณ์หรือไม่ ?
	Click Element	xpath= /html/body/div[1]/div[2]/div[2]/div/div/div[2]/div/div/div[3]/button[2]
	Close Browser