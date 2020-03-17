*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${SEVRER}    localhost:8080
${URL}   http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/auth/login
${Pic}	
${BROWSER}    chrome
${delay}    0.5
${location} = http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/devicesub/1

*** Test Cases ***

TC37 Open Maintenance page
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair

TC39 กรอกข้อมูลครบ
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Select From List By Index    device_type    13
    Select From List By Index    device_sub    1
    Select From List By Index    device_list    1
    Input Text	  //*[@id="inputBreakdown"]          คีย์บอร์ดเสีย
    Select From List By Index    priority    2
    Click Element                  	xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/form/div[7]/div/button
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair

TC41 กรอกข้อมูลซ้ำ
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Select From List By Index    device_type    13
    Select From List By Index    device_sub    1
    Select From List By Index    device_list    1
    Clear Element Text	         location
    Input Text	  //*[@id="inputBreakdown"]          คีย์บอร์ดเสีย
    Select From List By Index    priority    2
    Click Element                  	xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/form/div[7]/div/button
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair       

TC42 ไม่กรอก ประเภทของครุภัณฑ์
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Select From List By Index    device_sub    1
    Select From List By Index    device_list    1
    Input Text	  //*[@id="inputBreakdown"]          คีย์บอร์ดเสีย
    Select From List By Index    priority    2
    Click Element                  	xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/form/div[7]/div/button
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Page Should Contain                

TC43 ไม่กรอก รายการของครุภัณฑ์
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Select From List By Index    device_type    13
    Select From List By Index    device_list    1
    Input Text	  //*[@id="inputBreakdown"]          คีย์บอร์ดเสีย
    Select From List By Index    priority    2
    Click Element                  	xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/form/div[7]/div/button
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair

TC44 ไม่กรอก รหัสของครุภัณฑ์  
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Select From List By Index    device_type    13
    Select From List By Index    device_sub    1
    Input Text	  //*[@id="inputBreakdown"]          คีย์บอร์ดเสีย
    Select From List By Index    priority    2
    Click Element                  	xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/form/div[7]/div/button
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair

TC45 ไม่กรอกข้อมูล อาการ
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Select From List By Index    device_type    13
    Select From List By Index    device_sub    1
    Select From List By Index    device_list    1
    Select From List By Index    priority    2
    Click Element                  	xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/form/div[7]/div/button
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair


TC46 ไม่กรอกข้อมูล ความเร่งด่วนของการซ่อม
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Select From List By Index    device_type    13
    Select From List By Index    device_sub    1
    Select From List By Index    device_list    1
    Clear Element Text	         location
    Input Text	  //*[@id="inputBreakdown"]          คีย์บอร์ดเสีย
    Click Element                  	xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/form/div[7]/div/button
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair


TC47 ไม่กรอกข้อมูลอะไรเลย
    set Selenium speed		${DELAY}
	Open Browser 	 ${URL}    ${BROWSER}
	Input Text    usernameInput		thitiphat.j@kkumail.com
	Input Text	  passwordInput		BTuVs#&y2T%fVy#6f$z!9$HpN4LD!A36
    Click Element                  	xpath=/html/body/div/div[1]/div/form/button
	Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/
    Click Element                  xpath=/html/body/div/div[2]/div[1]/ul/li[3]/a/div[2]
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair
    Click Element                  	xpath=/html/body/div/div[2]/div[2]/div/div/div[2]/form/div[7]/div/button
    Location Should Be				http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/repair