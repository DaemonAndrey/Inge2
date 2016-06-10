package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class 82EliminarPorCompletoTipoDeRecursoExitosamente {
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
  public void test82EliminarPorCompletoTipoDeRecursoExitosamente() throws Exception {
    driver.get(baseUrl + "/protea/src/protea_reservations/");
    driver.findElement(By.linkText("Ingresar")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("monica@ucr.ac.cr");
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("monicamonica");
    driver.findElement(By.cssSelector("button.btn.btn-info")).click();
    driver.findElement(By.linkText("Recursos")).click();
    driver.findElement(By.linkText("Administrar tipos de recursos")).click();
    driver.findElement(By.xpath("//tr[4]/td[3]/a/span")).click();
    assertTrue(closeAlertAndGetItsText().matches("^¿Está seguro que desea eliminar el tipo de recurso[\\s\\S] Todos los recursos asociados a este tipo también se eliminarán\\.$"));
    for (int second = 0;; second++) {
    	if (second >= 60) fail("timeout");
    	try { if (isElementPresent(By.cssSelector("div.message.success"))) break; } catch (Exception e) {}
    	Thread.sleep(1000);
    }

    try {
      assertEquals("Se han eliminado todos sus recursos de tipo Sala", driver.findElement(By.cssSelector("div.message.success")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.linkText("Salir")).click();
    driver.findElement(By.linkText("Ingresar")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("admin@ucr.ac.cr");
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("adminadmin");
    driver.findElement(By.cssSelector("button.btn.btn-info")).click();
    driver.findElement(By.linkText("Recursos")).click();
    driver.findElement(By.linkText("Administrar tipos de recursos")).click();
    driver.findElement(By.xpath("//tr[4]/td[3]/a/span")).click();
    assertTrue(closeAlertAndGetItsText().matches("^¿Está seguro que desea eliminar el tipo de recurso[\\s\\S] Todos los recursos asociados a este tipo también se eliminarán\\.$"));
    for (int second = 0;; second++) {
    	if (second >= 60) fail("timeout");
    	try { if (isElementPresent(By.cssSelector("div.message.success"))) break; } catch (Exception e) {}
    	Thread.sleep(1000);
    }

    try {
      assertEquals("Se ha eliminado el tipo de recurso Sala junto con todos sus recursos de este tipo", driver.findElement(By.cssSelector("div.message.success")).getText());
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
