*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${SEVRER}    localhost:8080
${URL}   http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
${Pic}	
${BROWSER}    chrome
${delay}    0.2
${empty}
*** Test Cases ***

TC57 Open MaintenanceList page
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		admin
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repairlist
    Page Should Contain             รายการแจ้งซ่อม
    Page Should Contain             รหัส
    Page Should Contain             สเปค
    Page Should Contain             อาการ
    Page Should Contain             ตำแหน่ง
    Page Should Contain             ความเร่งด่วน
	Close Browser

TC58 กด ปุ่มรับเรื่องซ่อมบำรุง
       set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		admin
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repairlist
    Page Should Contain             รายการแจ้งซ่อม
    Page Should Contain             รหัส
    Page Should Contain             สเปค
    Page Should Contain             อาการ
    Page Should Contain             ตำแหน่ง
    Page Should Contain             ความเร่งด่วน
    Click Element                   xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/div[1]/div[6]/button[1]
    Page Should Contain             จะรับเรื่องซ่อมนี้หรือไม่
    Click Element                   xpath=/html/body/div[2]/div[2]/div/div/div/div/div/div/div/div[4]/button[1]
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repairlist



TC59 กดปุ่ม ปิดงานซ่อม
	set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		admin
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repairlist
    Page Should Contain             รายการแจ้งซ่อม
    Page Should Contain             รหัส
    Page Should Contain             สเปค
    Page Should Contain             อาการ
    Page Should Contain             ตำแหน่ง
    Page Should Contain             ความเร่งด่วน
	Click Element					xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/div[1]/div[6]/button
	Page Should Contain				ระบุหมายเหตุ
	Click Element					xpath=/html/body/div[2]/div[2]/div/div/div/div/div/div/div/div[4]/button[1]
	Page Should Contain				ต้องการปิดงานซ่อมบำรุงนี้หรือไม่
	Click Element					xpath=/html/body/div[2]/div[2]/div/div/div/div/div/div/div/div[4]/button[1]
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repairlist
	Close Browser
									