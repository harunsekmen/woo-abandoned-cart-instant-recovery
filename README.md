# 🚀 WooCommerce Instant Checkout Cart Recovery

[🇬🇧 English](README.md) · [🇹🇷 Türkçe](README.tr.md)

[![WooCommerce HPOS Ready](https://img.shields.io/badge/Compatibility-Production%20Ready-7f54b3.svg)](#)
[![License: GPL-3.0](https://img.shields.io/badge/License-GPL%203.0-blue.svg)](LICENSE)
[![Open Source](https://img.shields.io/badge/Open%20Source-Community%20Project-brightgreen.svg)](#)

> Asynchronous email capture on input focus-out, generating one-click direct recovery URLs with restored cart sessions.

Developed and maintained by **[Harun Sekmen](https://github.com/harunsekmen)** — E-Commerce Systems Engineer & WooCommerce Specialist.

[✉️ Contact: sekmenwp@gmail.com](mailto:sekmenwp@gmail.com) · [🌐 Website: harunsekmen.com](https://harunsekmen.com) · [🔗 LinkedIn](https://www.linkedin.com/in/harunsekmen/) · [💼 Upwork](https://www.upwork.com/freelancers/~01a7a8b58043e6e6d9)

---

## ⚡ The Problem It Solves

Shoppers input their email on checkout and leave without completing; standard WooCommerce discards unsubmitted forms.

Targeted specifically for **Stores wanting automated cart recovery without $150+/mo Klaviyo fees**.

Common search inquiries addressed by this repository: `woocommerce abandoned cart recovery free`, `recover abandoned carts woocommerce no monthly fee`, `cart abandonment email woocommerce`.

---

## 🛠️ Key Architectural Features

- **Production-Ready Architecture:** Built with clean standards (PHP 8.1+, Action Scheduler, LocalStorage).
- **Conversion-Optimized Experience:** Engineered to eliminate friction and elevate Average Order Value (AOV).
- **Zero Heavy Page Builder Dependencies:** Direct native code without unnecessary plugin bloat.
- **High-Performance Compatibility:** Tested for modern e-commerce standards and high-traffic reliability.

---

## 💻 Tech Stack & Standards

- **Platform:** WooCommerce
- **Category:** Checkout & Funnels
- **Technologies:** PHP 8.1+, Action Scheduler, LocalStorage

---

## 💼 Work With Harun Sekmen

Need this architecture customized for your brand, or looking for turnkey e-commerce engineering?

- **Custom Store Development:** Bespoke storefronts, high-converting checkout funnels, and catalog architecture.
- **Shopify to WooCommerce Migration:** Full catalog, customer data, and order history transfers with zero commission fees.
- **Performance & Speed Audits:** Eliminating bottlenecks, reducing cart latency, and optimizing Core Web Vitals.
- **Custom Integrations:** Connecting payment gateways (Stripe, PayPal, iyzico, PayTR), ERPs, and shipping APIs.

📩 **Inquiries:** Send your project brief or store URL to **[sekmenwp@gmail.com](mailto:sekmenwp@gmail.com)** or connect on **[LinkedIn](https://www.linkedin.com/in/harunsekmen/)**.

---

## 🧪 Automated Testing & Live Verification

This repository includes a standalone test suite with zero external mock dependencies.

### How to Run Tests
```bash
php tests/test-recovery.php
```

### Verification Scope
- **Test Target:** `Tests email focus-out validation, secure 32-character recovery token generation, and single-click cart session restoration.`
- **Environment:** PHP 8.1 - 8.3 CLI + WooCommerce Session Pipeline
- **Status:** All assertions passing (0 errors, 0 warnings under strict error reporting).

---

## 📄 License

This open-source project is licensed under the **[GNU General Public License v3.0](LICENSE)**.
