# 🚀 WooCommerce Anlık Terk Edilmiş Sepet Kurtarma Motoru

[🇬🇧 English](README.md) · [🇹🇷 Türkçe](README.tr.md)

> Müşteri ödeme sayfasında e-posta veya telefonunu yazdığı anda veriyi güvenle yakalayan ve terk edilen siparişleri kurtarmak için otomatik kurtarma bağlantıları üreten yerel motor.

Geliştirici ve Bakım Sorumlusu: **[Harun Sekmen](https://github.com/harunsekmen)** — E-Ticaret Sistem Mühendisi & WooCommerce Uzmanı.

[✉️ İletişime Geç](mailto:sekmenwp@gmail.com) · [💼 Upwork Profili](https://www.upwork.com/freelancers/~01a7a8b58043e6e6d9) · [🔗 GitHub Ana Profil](https://github.com/harunsekmen)

---

## ⚡ Çözdüğü Kritik Sorun

E-ticaret sitelerinde sepet terk oranı ortalama %70 seviyesindedir:
- Müşteriler formu doldururken sayfayı terk ettiğinde standart WooCommerce bu veriyi kaydetmez.
- Harici terk edilmiş sepet SaaS araçları mağaza cirosu üzerinden yüksek komisyon veya aylık ücret talep eder.
- Müşteri verileri üçüncü parti sunucularda saklandığı için KVKK ve GDPR riskleri doğar.

Bu eklenti, tüm kurtarma sürecini kendi WordPress veritabanınızda tutarak sıfır ek maliyetle terk edilen siparişleri kazanca dönüştürür.

---

## 🛠️ Öne Çıkan Özellikler

- **Canlı Alan Yakalama:** Müşteri ödeme formunda e-postasını girdiği anda güvenli ajax transient ile kaydedilir.
- **Tek Tıkla Sepet Geri Yükleme:** Müşteriye giden bağlantı, sepet içeriğini ve adres bilgilerini tek tıkla geri yükler.
- **Kendi Sunucunuzda Gizlilik:** Müşteri bilgileri üçüncü parti platformlara aktarılmaz, kendi veritabanınızda güvenle saklanır.
- **HPOS Uyumlu:** WooCommerce Yüksek Performanslı Sipariş Depolama yapısıyla %100 uyumludur.

---

## 🏗️ Teknik Mimari ve Standartlar

`PHP 8.1+` • `WooCommerce HPOS` • `Action Scheduler` • `Vanilla JS`

---

## 🚀 Kurulum ve Test

1. Klonlayın ve test edin:
   ```bash
   git clone https://github.com/harunsekmen/woo-abandoned-cart-instant-recovery.git wp-content/plugins/woo-abandoned-cart-instant-recovery
   php wp-content/plugins/woo-abandoned-cart-instant-recovery/tests/test-recovery.php
   ```

---

## 📄 Lisans

Bu proje **GPL-3.0 Lisansı** ile açık kaynak olarak sunulmaktadır.
