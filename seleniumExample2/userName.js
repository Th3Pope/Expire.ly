const {Builder, By, Key, util} = require("selenium-webdriver");

async function example(){
    let driver = await new Builder().forBrowser("firefox").build();
    driver.get("username page");
    
    //click userName and type in user
    //driver.findElement(By.id("userName")).sendKeys("username");

    //click password and type in password
    //driver.findElement(By.id("password")).sendKeys("password");

    //click login
    //if no id in webpage, add id="login"; either before or afetr type="blah blah"
    //driver.findElement(By.id("login")).click();
    
}
example();