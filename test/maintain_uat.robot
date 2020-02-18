*** Settings ***
Suite Setup       Open Browser To Maintain Page
Suite Teardown    Close Browser
Resource          config.robot

*** Test Cases ***
Move priority of pending ticket from first to second
    ${first}    Get Text    //div[@id='pendingList']/div[1]/div[1]/b[1]
    Sleep    10s
    ${last}    Get Text    //div[@id='pendingList']/div[2]/div[1]/b[1]
    Should Be Equal    ${first}    ${last}

Close first pending ticket by draging to completed list
    ${first}    Get Text    //div[@id='pendingList']/div[1]/div[1]/b[1]
    Wait Until Page Contains Element    //button[text()='ปิดงาน']    10
    Click Element    //button[text()='ปิดงาน']
    Sleep    2s
    Wait Until Page Contains Element    //button[text()='ok']    10
    Click Element     //button[text()='ok']
    ${item_locator}=   Set Variable    (//div[@id='doneList']//div[@data-id='${first}'])[1]/div[1]/b[1]
    ${last}    Get Text    ${item_locator}
    Should Be Equal    ${first}    ${last}
