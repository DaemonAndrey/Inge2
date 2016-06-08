package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class 12CorreoNoInstitucional {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://localhost/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void test12CorreoNoInstitucional() throws Exception {
    driver.get(baseUrl + "/ProyectoProtea/src/protea_reservations/pages/home");
    driver.findElement(By.linkText("Inicio")).click();
    driver.findElement(By.linkText("Ingresar")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("monica@ucr.ac.cr");
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("monicamonica");
    driver.findElement(By.cssSelector("button.btn.btn-info")).click();
    driver.findElement(By.linkText("Cuentas de Usuarios")).click();
    driver.findElement(By.linkText("Agregar usuario")).click();
    driver.findElement(By.id("first-name")).clear();
    driver.findElement(By.id("first-name")).sendKeys("Esteban");
    driver.findElement(By.id("last-name")).clear();
    driver.findElement(By.id("last-name")).sendKeys("Bermudez");
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("12345678");
    driver.findElement(By.id("repass")).clear();
    driver.findElement(By.id("repass")).sendKeys("12345678");
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("esteban.bermudez@gmail.com");
    driver.findElement(By.id("telephone-number")).clear();
    driver.findElement(By.id("telephone-number")).sendKeys("82828282");
    new Select(driver.findElement(By.id("department"))).selectByVisibleText("Escuela Bibliotecología y Ciencias de la Información");
    new Select(driver.findElement(By.id("role-id"))).selectByVisibleText("Administrador");
    driver.findElement(By.cssSelector("button.btn.btn-info")).click();
    try {
      assertEquals("Debe usar el correo institucional.", driver.findElement(By.cssSelector("div.error-message")).getText());
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
