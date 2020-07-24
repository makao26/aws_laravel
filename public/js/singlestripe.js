var sc = document.createElement('script');
sc.src="https://checkout.stripe.com/checkout.js" class="stripe-button"
sc.data-key="pk_test_51H7Xd6Ju4I2NDDkUBeKvOz9sU1IkTxGtBmCOBHm2nt2KATT0sjUEsvPeDANhok4Nklk1ZJs7oCXE6mLuNf9DQ4FA00SKUha6Gz"
sc.data-amount= document.getElementById("pay_num");
sc.data-name="TEST"
sc.data-description="TESTTEST"
sc.data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
sc.data-locale="ja"
sc.data-currency="jpy"
document.body.appendChild(sc);
