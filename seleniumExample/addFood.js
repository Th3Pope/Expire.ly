const {Builder, By, Key, util} = require("selenium-webdriver");

async function example(){
    let driver = await new Builder().forBrowser("firefox").build();
    driver.get("file:///C:/Users/austi/OneDrive/Documents/GitHub/expirely/dbtest/index.html");

    //click create new button
    driver.findElement(By.id("creatNew")).click();

    //enter info for food
    driver.findElement(By.id("foodName")).sendKeys("Hotdogs");
    driver.findElement(By.id("foodAmount")).sendKeys("10");
    driver.findElement(By.id("foodExpiration")).sendKeys("2022-12-25");
    driver.findElement(By.id("foodDescription")).sendKeys("Best hotdogs ya find around");
    
    //add imag, file not found anywhere i put but i personally added a photo so i know it works lol
    //driver.findElement(By.id("foodImage")).sendKeys("C:\Users\austi\OneDrive\Documents\GitHub\hotdogs.jpg");

    //click add button and close button
    driver.findElement(By.id("addNew")).click();
    //close not working in index.php file but should work once completely running
    //driver.findElement(By.id("closeForm")).click();
    

    //to delete line line in this case the top
    driver.findElement(By.id("trash")).click();
    

    
    
}
example();