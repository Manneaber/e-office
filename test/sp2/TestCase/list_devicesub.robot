*** Settings ***
Library    SeleniumLibrary
	
*** Variables ***
${WEBPAGE}    http://10.199.66.227/SoftEn2020/Sec01/CSEnterprise/devicesub/1
${BROWSER}    chrome
${DELEY}    0.2
${listid}    5602130000089
${spec}    
${location}    
${note}    
${status}    0
	
*** Test Cases ***

Go To WEBPAGE

    Open Browser 	 ${WEBPAGE} 	${BROWSER}

TC1
    Set Selenium Speed    ${DELEY}
    Click Element    //*[@id="container-fluid"]/div[2]/div[2]/div/div[1]/button
    Input Text    listid    ${listid}  
    Input Text    spec    ${spec}
    Input Text    location    ${location}
    Input Text    note    ${note}
    Select From List By Index    status    ${status}
    Click Element    //*[@id="addModel"]/div/div/form/div[1]/div[6]/div[1]/input
    Click Element    //*[@id="addModel"]/div/div/form/div[1]/div[6]/div[2]/input
    Click Element    //*[@id="addModel"]/div/div/form/div[2]/button[2]
    Page Should Contain    5602130000089

