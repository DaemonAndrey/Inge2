package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class 16ReservarIndicandoSiglaYNombreCurso {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://localhost/protea/src/protea_reservations/pages/home";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void test16ReservarIndicandoSiglaYNombreCurso() throws Exception {
    driver.get(baseUrl + "/protea/src/protea_reservations/reservations");
    new Select(driver.findElement(By.id("start"))).selectByVisibleText("10:00:00");
    new Select(driver.findElement(By.id("resource_type"))).selectByVisibleText("Proyector");
    driver.findElement(By.id("course_id")).clear();
    driver.findElement(By.id("course_id")).sendKeys("CI-1315");
    driver.findElement(By.id("course_name")).clear();
    driver.findElement(By.id("course_name")).sendKeys("Redes");
    driver.findElement(By.cssSelector("button.btn.btn-success")).click();
    try {
      assertEquals("¡Su reservación está siendo procesada!", driver.findElement(By.cssSelector("div.modal-body")).getText());
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
