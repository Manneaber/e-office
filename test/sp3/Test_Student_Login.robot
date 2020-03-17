*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${SEVRER}    localhost:8080
${URL}   http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
${Pic}	
${BROWSER}    chrome
${delay}    0.2

*** Test Cases ***

TC01 Open Browser
	Open Browser    ${URL}    ${BROWSER}
	Location Should Be		http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
	Close Browser
	
TC02 Login Student Success
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
	Click Element					xpath=/html/body/div/div[1]/div[2]/div/div[2]/div/div/a/img
	Page Should Contain		นายฐิติพัฒน์ เจนวิชชุวงศ์
    Page Should Contain     หน้าหลัก
    Page Should Contain     แจ้งซ่อม
	Close Browser

	
TC05 ไม่กรอกUsername
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
	Close Browser
	

TC06 ไม่กรอก Password
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
	Close Browser

TC07 ไม่กรอกUsernameและPassword
	Open Browser 	 ${URL}    ${BROWSER}
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
	Close Browser

TC08 กรอกUsernameไม่ถูกต้อง
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput			wrongadmin		
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
    Page should Contain             เกิดข้อผิดพลาด User or pass missmatch
	Close Browser	
	

TC09 กรอกPasswordไม่ถูกต้อง
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput    		thitiphat.j@kkumail.com
	Input Text		passwordInput		wrongpassword
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
    Page should Contain             เกิดข้อผิดพลาด User or pass missmatch
	Close Browser

TC10 กรอกUsernameและPasswordไม่ถูกต้อง
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		wrongadmin
	Input Text	  passwordInput		wrongpassword
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
    Page should Contain             เกิดข้อผิดพลาด User or pass missmatch
	Close Browser


TC11 ใช้ตัวอักษรพิเศษกรอกUsername
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		abc####@$               
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
    Page should Contain             เกิดข้อผิดพลาด User or pass missmatch
	Close Browser
	
TC12 ใช้ตัวอักษรพิเศษกรอกPassword
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		abc####@$               
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
    Page should Contain             เกิดข้อผิดพลาด User or pass missmatch
	Close Browser
	
TC13 ใช้ตัวอักษรพิเศษกรอกUsernameและPassword
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		abc####@$               
	Input Text	  passwordInput		abc####@$               
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
    Page should Contain             เกิดข้อผิดพลาด User or pass missmatch
	Close Browser

TC14 กรอกPassword น้อยกว่า8ตัว
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		Btu
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
    Page should Contain             เกิดข้อผิดพลาด User or pass missmatch
	Close Browser

TC15 กรอกPassword มากกว่า32ตัว	
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36gfdfdgfewqa
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
    Page should Contain             เกิดข้อผิดพลาด User or pass missmatch
	Close Browser