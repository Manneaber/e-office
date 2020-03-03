*** Settings ***
Library           SeleniumLibrary

*** Variables ***
${SERVER}         localhost
${BROWSER}        Chrome
${DELAY}          0
${MAINTAIN URL}      http://${SERVER}/e-office/web/admin/maintain

*** Keywords ***
Open Browser To Maintain Page
    Open Browser    ${MAINTAIN URL}    ${BROWSER}
    Set Selenium Speed    ${DELAY}
    Maintain Page Should Be Open

Maintain Page Should Be Open
    Title Should Be    Maintain

Go To Maintain Page
    Go TO    ${MAINTAIN URL}