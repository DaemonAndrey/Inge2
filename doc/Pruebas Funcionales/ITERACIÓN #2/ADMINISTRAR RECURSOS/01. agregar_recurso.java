package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class AgregarRecurso {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://localhost/protea/src/protea_reservations";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testAgregarRecurso() throws Exception {
    driver.get(baseUrl + "/protea/src/protea_reservations/");
    driver.findElement(By.linkText("Ingresar")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("admin@ucr.ac.cr");
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("adminadmin");
    driver.findElement(By.cssSelector("button.btn.btn-info")).click();
    driver.get(baseUrl + "/protea/src/protea_reservations/resources");
    driver.findElement(By.linkText("Agregar recurso")).click();
    new Select(driver.findElement(By.id("resources-resource-type"))).selectByVisibleText("Computadora");
    driver.findElement(By.id("resources-resource-name")).clear();
    driver.findElement(By.id("resources-resource-name")).sendKeys("Computadora Nueva de prueba");
    driver.findElement(By.id("resources-resource-code")).clear();
    driver.findElement(By.id("resources-resource-code")).sendKeys("serieplaca1234");
    driver.findElement(By.id("resources-description")).clear();
    driver.findElement(By.id("resources-description")).sendKeys("descripcion de la computadora");
    driver.findElement(By.cssSelector("button.btn.btn-success")).click();
    try {
      assertEquals("Se ha agregado el nuevo recurso", driver.findElement(By.cssSelector("div.message.success")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
