<?php
$products = [
    ['id' => 'classic-burger', 'name' => 'Classic Burger', 'description' => 'Beef patty · lettuce · house sauce', 'price' => 55.00, 'icon' => 'bi-egg-fried', 'color' => 'coral'],
    ['id' => 'cheeseburger', 'name' => 'Cheeseburger', 'description' => 'Beef patty · melted cheddar', 'price' => 65.00, 'icon' => 'bi-emoji-smile', 'color' => 'gold'],
    ['id' => 'ham-sandwich', 'name' => 'Ham Sandwich', 'description' => 'Ham · cheese · garden greens', 'price' => 40.00, 'icon' => 'bi-layout-text-sidebar-reverse', 'color' => 'mint'],
    ['id' => 'french-fries', 'name' => 'French Fries', 'description' => 'Regular · lightly salted', 'price' => 45.00, 'icon' => 'bi-funnel', 'color' => 'lavender'],
    ['id' => 'nachos', 'name' => 'Nachos', 'description' => 'Crispy chips · nacho cheese', 'price' => 50.00, 'icon' => 'bi-triangle', 'color' => 'peach'],
    ['id' => 'soda', 'name' => 'Soda', 'description' => 'Chilled can · assorted flavors', 'price' => 25.00, 'icon' => 'bi-cup-straw', 'color' => 'sky'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f7f8fc">
    <title>Campus Bites | Snack Bar POS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #20243a;
            --muted: #858ba0;
            --accent: #ef7258;
            --accent-dark: #dc5c42;
            --surface: #fff;
            --canvas: #f7f8fc;
            --line: #edf0f5;
        }
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            background: var(--canvas);
            color: var(--ink);
            font-family: "DM Sans", sans-serif;
        }
        h1, h2, h3, h4, .brand-name { font-family: "Manrope", sans-serif; }
        .topbar {
            height: 76px;
            background: rgba(255,255,255,.94);
            border-bottom: 1px solid var(--line);
        }
        .brand-mark {
            width: 42px; height: 42px; display: grid; place-items: center;
            color: #fff; background: var(--accent); border-radius: 14px;
            font-size: 1.25rem; box-shadow: 0 7px 16px #ef725833;
        }
        .brand-name { font-size: 1.02rem; font-weight: 800; letter-spacing: -.04em; }
        .brand-caption, .eyebrow { color: var(--muted); font-size: .75rem; }
        .status-pill {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 13px; border: 1px solid #e9edf2;
            border-radius: 999px; background: #fff; color: #535b70;
            font-size: .8rem; font-weight: 600;
        }
        .status-dot { width: 7px; height: 7px; border-radius: 50%; background: #49b88a; }
        .page-heading { font-size: clamp(1.55rem, 2.5vw, 2rem); font-weight: 800; letter-spacing: -.055em; }
        .section-label {
            color: #777e94; font-size: .72rem; font-weight: 700;
            letter-spacing: .13em; text-transform: uppercase;
        }
        .product-card {
            height: 100%; padding: 19px; border: 1px solid var(--line);
            border-radius: 18px; background: var(--surface);
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
        }
        .product-card:hover {
            transform: translateY(-3px); border-color: #f3c5ba;
            box-shadow: 0 12px 28px #28304b0c;
        }
        .product-icon {
            width: 52px; height: 52px; display: grid; place-items: center;
            border-radius: 16px; font-size: 1.4rem;
        }
        .tone-coral { color: #dc654d; background: #fff0ec; }
        .tone-gold { color: #be8a23; background: #fff6df; }
        .tone-mint { color: #31977a; background: #e8f8f1; }
        .tone-lavender { color: #7967c5; background: #f0edff; }
        .tone-peach { color: #d5773e; background: #fff0e4; }
        .tone-sky { color: #4388bf; background: #e8f4ff; }
        .product-name { margin: 17px 0 5px; font-size: .98rem; font-weight: 700; letter-spacing: -.025em; }
        .product-description { min-height: 34px; color: var(--muted); font-size: .76rem; line-height: 1.45; }
        .product-price { font-size: 1.03rem; font-weight: 800; letter-spacing: -.03em; }
        .add-button {
            width: 36px; height: 36px; display: grid; place-items: center;
            border: 0; border-radius: 11px; background: #fff0ec;
            color: var(--accent); font-size: 1rem; transition: .15s ease;
        }
        .add-button:hover { background: var(--accent); color: #fff; }
        .add-button:disabled { cursor: not-allowed; opacity: .5; }
        .order-card {
            position: sticky; top: 96px; overflow: hidden;
            border: 1px solid var(--line); border-radius: 20px; background: #fff;
            box-shadow: 0 12px 36px #28304b08;
        }
        .order-header { padding: 21px 22px 17px; border-bottom: 1px solid var(--line); }
        .order-title { margin: 0; font-size: 1rem; font-weight: 800; letter-spacing: -.035em; }
        .order-number {
            padding: 5px 9px; border-radius: 8px; color: #747b90;
            background: #f5f6fa; font-size: .69rem; font-weight: 700;
        }
        .cart-items { max-height: 285px; min-height: 132px; overflow-y: auto; padding: 5px 22px; }
        .empty-cart { min-height: 122px; display: grid; place-content: center; text-align: center; }
        .empty-cart-icon {
            width: 42px; height: 42px; display: grid; place-items: center;
            margin: 0 auto 9px; border-radius: 14px; background: #f5f6fa; color: #a4a9b8;
            font-size: 1.1rem;
        }
        .empty-cart p { margin: 0; color: var(--muted); font-size: .78rem; }
        .cart-row { display: flex; align-items: center; gap: 11px; padding: 14px 0; border-bottom: 1px solid #f1f2f6; }
        .cart-row:last-child { border-bottom: 0; }
        .cart-item-icon { width: 38px; height: 38px; flex: 0 0 38px; display: grid; place-items: center; border-radius: 12px; font-size: 1rem; }
        .cart-item-copy { min-width: 0; flex: 1; }
        .cart-item-name { overflow: hidden; margin-bottom: 3px; font-size: .78rem; font-weight: 700; text-overflow: ellipsis; white-space: nowrap; }
        .cart-item-subtotal { color: var(--muted); font-size: .72rem; }
        .quantity-controls { display: flex; align-items: center; gap: 8px; }
        .quantity-button {
            width: 25px; height: 25px; display: grid; place-items: center;
            padding: 0; border: 1px solid #e9ebf1; border-radius: 8px;
            background: #fff; color: #5f667b; font-size: .68rem;
        }
        .quantity-button:hover { border-color: #f0b8aa; color: var(--accent-dark); }
        .quantity-button:disabled, .remove-button:disabled { cursor: not-allowed; opacity: .45; }
        .quantity-value { min-width: 12px; text-align: center; font-size: .75rem; font-weight: 700; }
        .remove-button { padding: 3px; border: 0; background: transparent; color: #b2b6c3; font-size: .82rem; }
        .remove-button:hover { color: #d74e4e; }
        .order-details { padding: 15px 22px 0; border-top: 1px solid var(--line); }
        .summary-line { display: flex; justify-content: space-between; margin-bottom: 10px; color: #777e91; font-size: .79rem; }
        .summary-total { margin: 0; padding: 15px 0; border-top: 1px dashed #e7e9ef; color: var(--ink); font-size: .88rem; font-weight: 700; }
        .summary-total strong { font-size: 1.25rem; letter-spacing: -.04em; }
        .payment-section { padding: 0 22px 21px; }
        .form-label { margin-bottom: 7px; color: #555c70; font-size: .76rem; font-weight: 700; }
        .payment-input { min-height: 45px; border-color: #e7e9ef; border-radius: 11px; font-size: .9rem; }
        .payment-input:focus { border-color: #f0a18e; box-shadow: 0 0 0 .2rem #ef72581a; }
        .currency-prefix { color: #858ba0; font-weight: 600; }
        .pay-button, .new-order-button {
            width: 100%; min-height: 46px; border: 0; border-radius: 12px;
            background: var(--accent); color: #fff; font-size: .84rem; font-weight: 700;
            transition: background .15s ease, transform .15s ease;
        }
        .pay-button:hover, .new-order-button:hover { transform: translateY(-1px); background: var(--accent-dark); color: #fff; }
        .pay-button:disabled { cursor: not-allowed; background: #c9cbd4; }
        .message-box { display: none; margin-bottom: 12px; padding: 10px 12px; border-radius: 10px; font-size: .75rem; }
        .message-box.show { display: block; }
        .message-box.error { color: #a83d3d; background: #fff0f0; }
        .message-box.success { color: #247650; background: #eaf8f0; }
        .receipt {
            display: none; margin: 0 22px 20px; padding: 16px;
            border: 1px dashed #c9d1dc; border-radius: 13px; background: #fbfcff;
        }
        .receipt.show { display: block; }
        .receipt-heading { text-align: center; }
        .receipt-heading h3 { margin: 0 0 4px; font-size: .9rem; font-weight: 800; }
        .receipt-heading p, .receipt-meta { margin: 0; color: var(--muted); font-size: .68rem; }
        .receipt-items { margin: 12px 0; padding: 10px 0; border-top: 1px dashed #dce0e8; border-bottom: 1px dashed #dce0e8; }
        .receipt-row { display: flex; justify-content: space-between; gap: 10px; margin: 5px 0; font-size: .7rem; }
        .receipt-row.muted { color: #777e91; }
        .receipt-row.grand { margin-top: 8px; font-weight: 800; }
        .receipt-footer { color: #777e91; text-align: center; font-size: .68rem; }
        .receipt-actions { display: flex; gap: 8px; margin-top: 12px; }
        .receipt-action {
            flex: 1; padding: 8px; border: 1px solid #e7e9ef; border-radius: 9px;
            background: #fff; color: #596176; font-size: .72rem; font-weight: 700;
        }
        .receipt-action:hover { border-color: #f0b8aa; color: var(--accent-dark); }
        .new-order-button { display: none; margin: 0 22px 21px; width: calc(100% - 44px); background: #303750; }
        .new-order-button:hover { background: #20263b; }
        .footer-note { color: #9ba0ae; font-size: .72rem; }
        @media (max-width: 991.98px) { .order-card { position: static; } }
        @media (max-width: 575.98px) {
            .topbar { height: 66px; }
            main.container { padding-top: 25px !important; }
            .product-card { padding: 15px; }
            .product-icon { width: 46px; height: 46px; }
        }
        @media print {
            body * { visibility: hidden !important; }
            #receipt, #receipt * { visibility: visible !important; }
            #receipt { position: absolute; inset: 0 auto auto 0; display: block !important; width: 100%; margin: 0; border: 0; }
            .receipt-actions { display: none; }
        }
    </style>
</head>
<body>
    <nav class="topbar d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="d-flex align-items-center gap-3 text-decoration-none text-reset" href="#" aria-label="Campus Bites home">
                <span class="brand-mark"><i class="bi bi-shop"></i></span>
                <span>
                    <span class="brand-name d-block">Campus Bites</span>
                    <span class="brand-caption">SNACK BAR · POINT OF SALE</span>
                </span>
            </a>
            <span class="status-pill"><span class="status-dot"></span><span>Counter is open</span></span>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4 g-xl-5">
            <section class="col-lg-7 col-xl-8" aria-labelledby="menu-heading">
                <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
                    <div>
                        <div class="eyebrow mb-2">GOOD FOOD, GOOD DAY <span aria-hidden="true">✦</span></div>
                        <h1 class="page-heading mb-2" id="menu-heading">Tomboy akong katapad!</h1>
                        <p class="text-secondary small mb-0">Pick a snack and add it to your order.</p>
                    </div>
                    <span class="section-label">TODAY'S MENU</span>
                </div>
                <div class="row row-cols-2 row-cols-md-3 g-3">
                    <?php foreach ($products as $product): ?>
                        <div class="col">
                            <article class="product-card">
                                <div class="d-flex align-items-start justify-content-between">
                                    <span class="product-icon tone-<?= htmlspecialchars($product['color'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true">
                                        <i class="bi <?= htmlspecialchars($product['icon'], ENT_QUOTES, 'UTF-8') ?>"></i>
                                    </span>
                                    <button
                                        class="add-button"
                                        type="button"
                                        data-add-product="<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?>"
                                        aria-label="Add <?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?> to order"
                                    ><i class="bi bi-plus-lg" aria-hidden="true"></i></button>
                                </div>
                                <h2 class="product-name"><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></h2>
                                <p class="product-description"><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                <div class="product-price">₱<?= number_format($product['price'], 2) ?></div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="footer-note mt-4 mb-0"><i class="bi bi-info-circle me-1"></i>Prices are in Philippine pesos and include applicable taxes.</p>
            </section>

            <aside class="col-lg-5 col-xl-4" aria-labelledby="order-heading">
                <section class="order-card">
                    <div class="order-header d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="order-title" id="order-heading">Current order</h2>
                            <span class="eyebrow">YOUR SNACKS, ALL IN ONE PLACE</span>
                        </div>
                        <span class="order-number" id="order-number">ORDER #001</span>
                    </div>
                    <div class="cart-items" id="cart-items" aria-live="polite">
                        <div class="empty-cart" id="empty-cart">
                            <span class="empty-cart-icon"><i class="bi bi-basket2" aria-hidden="true"></i></span>
                            <p>Your order is looking a little empty.</p>
                            <p>Add something tasty to get started!</p>
                        </div>
                    </div>
                    <div class="order-details">
                        <div class="summary-line"><span>Items</span><span id="item-count">0 items</span></div>
                        <div class="summary-line summary-total"><span>Total due</span><strong id="order-total">₱0.00</strong></div>
                    </div>
                    <div class="payment-section">
                        <label class="form-label" for="amount-paid">Cash received</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-white border-end-0 currency-prefix">₱</span>
                            <input class="form-control payment-input border-start-0 ps-0" id="amount-paid" type="text" inputmode="decimal" autocomplete="off" placeholder="Enter amount" aria-describedby="payment-message">
                        </div>
                        <div class="message-box" id="payment-message" role="status" aria-live="polite"></div>
                        <button class="pay-button" id="pay-button" type="button"><i class="bi bi-check2-circle me-2"></i>Complete payment</button>
                    </div>
                    <section class="receipt" id="receipt" aria-label="Digital receipt" aria-live="polite"></section>
                    <button class="new-order-button" id="new-order-button" type="button"><i class="bi bi-arrow-counterclockwise me-2"></i>Start a new transaction</button>
                </section>
            </aside>
        </div>
    </main>

    <script>
        const products = <?= json_encode(array_map(static function ($product) {
            return [
                'id' => $product['id'],
                'name' => $product['name'],
                'priceCents' => (int) round($product['price'] * 100),
                'icon' => $product['icon'],
                'color' => $product['color'],
            ];
        }, $products), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;
        const productById = new Map(products.map(product => [product.id, product]));
        const cart = new Map();
        const formatMoney = cents => `₱${(cents / 100).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        const cartItems = document.getElementById('cart-items');
        const emptyCart = document.getElementById('empty-cart');
        const amountInput = document.getElementById('amount-paid');
        const payButton = document.getElementById('pay-button');
        const messageBox = document.getElementById('payment-message');
        const receipt = document.getElementById('receipt');
        const newOrderButton = document.getElementById('new-order-button');
        let isPaid = false;
        let transactionNumber = 1;

        function getTotals() {
            let itemCount = 0;
            let totalCents = 0;
            for (const [id, quantity] of cart) {
                const product = productById.get(id);
                itemCount += quantity;
                totalCents += product.priceCents * quantity;
            }
            return { itemCount, totalCents };
        }

        function showMessage(text, type) {
            messageBox.textContent = text;
            messageBox.className = `message-box show ${type}`;
        }

        function clearMessage() {
            messageBox.textContent = '';
            messageBox.className = 'message-box';
        }

        function renderCart() {
            const { itemCount, totalCents } = getTotals();
            cartItems.querySelectorAll('.cart-row').forEach(row => row.remove());
            emptyCart.hidden = cart.size > 0;
            document.querySelectorAll('[data-add-product]').forEach(button => {
                button.disabled = isPaid;
            });

            for (const [id, quantity] of cart) {
                const product = productById.get(id);
                const row = document.createElement('div');
                row.className = 'cart-row';
                row.innerHTML = `
                    <span class="cart-item-icon tone-${product.color}" aria-hidden="true"><i class="bi ${product.icon}"></i></span>
                    <div class="cart-item-copy">
                        <div class="cart-item-name">${product.name}</div>
                        <div class="cart-item-subtotal">${formatMoney(product.priceCents)} each · <strong>${formatMoney(product.priceCents * quantity)}</strong></div>
                    </div>
                    <div class="quantity-controls" aria-label="${product.name} quantity controls">
                        <button class="quantity-button" type="button" data-quantity-change="-1" data-product-id="${id}" aria-label="Decrease ${product.name} quantity" ${isPaid ? 'disabled' : ''}><i class="bi bi-dash"></i></button>
                        <span class="quantity-value" aria-label="Quantity">${quantity}</span>
                        <button class="quantity-button" type="button" data-quantity-change="1" data-product-id="${id}" aria-label="Increase ${product.name} quantity" ${isPaid ? 'disabled' : ''}><i class="bi bi-plus"></i></button>
                    </div>
                    <button class="remove-button" type="button" data-remove-product="${id}" aria-label="Remove ${product.name} from order" ${isPaid ? 'disabled' : ''}><i class="bi bi-trash3"></i></button>
                `;
                cartItems.appendChild(row);
            }

            document.getElementById('item-count').textContent = `${itemCount} ${itemCount === 1 ? 'item' : 'items'}`;
            document.getElementById('order-total').textContent = formatMoney(totalCents);
        }

        function startNewTransaction() {
            cart.clear();
            amountInput.value = '';
            amountInput.disabled = false;
            payButton.disabled = false;
            payButton.innerHTML = '<i class="bi bi-check2-circle me-2"></i>Complete payment';
            isPaid = false;
            receipt.classList.remove('show');
            receipt.replaceChildren();
            newOrderButton.style.display = 'none';
            clearMessage();
            renderCart();
            transactionNumber += 1;
            document.getElementById('order-number').textContent = `ORDER #${String(transactionNumber).padStart(3, '0')}`;
        }

        function addProduct(id) {
            if (isPaid || !productById.has(id)) return;
            cart.set(id, (cart.get(id) || 0) + 1);
            clearMessage();
            renderCart();
        }

        document.querySelectorAll('[data-add-product]').forEach(button => {
            button.addEventListener('click', () => addProduct(button.dataset.addProduct));
        });

        cartItems.addEventListener('click', event => {
            const button = event.target.closest('button');
            if (!button || isPaid) return;

            const id = button.dataset.productId || button.dataset.removeProduct;
            if (button.hasAttribute('data-remove-product')) {
                cart.delete(id);
            } else if (button.hasAttribute('data-quantity-change')) {
                const nextQuantity = (cart.get(id) || 0) + Number(button.dataset.quantityChange);
                if (nextQuantity <= 0) cart.delete(id);
                else cart.set(id, nextQuantity);
            } else {
                return;
            }

            clearMessage();
            renderCart();
        });

        amountInput.addEventListener('input', clearMessage);

        payButton.addEventListener('click', () => {
            if (isPaid) return;

            const rawAmount = amountInput.value.trim();
            if (rawAmount === '') {
                showMessage('Please enter the cash amount received.', 'error');
                amountInput.focus();
                return;
            }
            if (rawAmount.startsWith('-')) {
                showMessage('Payment cannot be a negative amount.', 'error');
                amountInput.focus();
                return;
            }
            if (!/^\d+(?:\.\d{1,2})?$/.test(rawAmount) || !Number.isFinite(Number(rawAmount))) {
                showMessage('Enter a valid numeric amount, such as 100 or 100.00.', 'error');
                amountInput.focus();
                return;
            }
            if (cart.size === 0) {
                showMessage('Add at least one item before accepting payment.', 'error');
                return;
            }

            const paidCents = Math.round(Number(rawAmount) * 100);
            const { totalCents } = getTotals();
            if (paidCents < totalCents) {
                showMessage(`Insufficient payment. The total due is ${formatMoney(totalCents)}.`, 'error');
                amountInput.focus();
                return;
            }

            const changeCents = paidCents - totalCents;
            const reference = `CB-${new Date().toISOString().slice(0, 10).replaceAll('-', '')}-${String(transactionNumber).padStart(3, '0')}-${Math.floor(1000 + Math.random() * 9000)}`;
            const purchasedItems = Array.from(cart, ([id, quantity]) => {
                const product = productById.get(id);
                return { name: product.name, quantity, subtotalCents: product.priceCents * quantity };
            });

            receipt.innerHTML = `
                <div class="receipt-heading">
                    <h3><i class="bi bi-check-circle-fill text-success me-1"></i>Payment confirmed</h3>
                    <p>Thank you for your order!</p>
                </div>
                <div class="receipt-meta text-center mt-2">Transaction ${reference}</div>
                <div class="receipt-items">
                    ${purchasedItems.map(item => `<div class="receipt-row"><span>${item.name} × ${item.quantity}</span><strong>${formatMoney(item.subtotalCents)}</strong></div>`).join('')}
                    <div class="receipt-row grand"><span>Total</span><span>${formatMoney(totalCents)}</span></div>
                </div>
                <div class="receipt-row muted"><span>Amount paid</span><span>${formatMoney(paidCents)}</span></div>
                <div class="receipt-row muted"><span>Change</span><span>${formatMoney(changeCents)}</span></div>
                <p class="receipt-footer mt-3 mb-0">Campus Bites · Have a lovely day!</p>
                <div class="receipt-actions">
                    <button class="receipt-action" type="button" data-print-receipt><i class="bi bi-printer me-1"></i>Print</button>
                    <button class="receipt-action" type="button" data-copy-reference="${reference}"><i class="bi bi-copy me-1"></i>Copy ref</button>
                </div>
            `;
            receipt.classList.add('show');
            showMessage(`Payment successful! Your change is ${formatMoney(changeCents)}.`, 'success');
            amountInput.disabled = true;
            payButton.disabled = true;
            payButton.innerHTML = '<i class="bi bi-check2 me-2"></i>Payment complete';
            isPaid = true;
            renderCart();
            newOrderButton.style.display = 'block';
        });

        receipt.addEventListener('click', async event => {
            if (event.target.closest('[data-print-receipt]')) {
                window.print();
            }
            const copyButton = event.target.closest('[data-copy-reference]');
            if (copyButton) {
                try {
                    await navigator.clipboard.writeText(copyButton.dataset.copyReference);
                    copyButton.innerHTML = '<i class="bi bi-check2 me-1"></i>Copied';
                } catch (error) {
                    showMessage('Could not copy the reference. You can select it from the receipt.', 'error');
                }
            }
        });

        newOrderButton.addEventListener('click', startNewTransaction);
        renderCart();
    </script>
</body>
</html>
