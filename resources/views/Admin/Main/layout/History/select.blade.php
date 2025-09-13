<div class="confirm">
    <div class="form col-xl-4 col-lg-3 col-md-3 col-sm-12">
        <div class="scanqr">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <main class="scan">
                <div id="reader"></div>
                <div id="result"></div>
            </main>
            <div class="content-scan">
            </div>
            <script src="{{asset("asset/javascript/scanner.js")}}"></script>
        </div>
    </div>
    <div class="listcart col-xl-8 col-lg-9 col-md-9 col-sm-12" style="padding: 0px 0px 0px 20px">
        <div class="cart-header">
            <h3><i class="bx bx-shopping-bag"></i> Selected Batteries</h3>
            <div class="cart-summary">
                <span class="total-items">{{count($detail)}} items</span>
            </div>
        </div>
        <section class="enhanced-cart">
            <div class="products-container">
                @foreach ($detail as $index => $row)
                    <div class="product-card" id="product-{{$index}}">
                        <div class="product-image">
                            <img src="{{asset("storage/image/Battery/$row->image.jpg")}}" alt="{{$row->name_battery}}">
                            <div class="product-badge">
                                <span class="battery-points">{{$row->point ?? 'N/A'}} pts</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-header">
                                <h4 class="product-name">{{$row->name_battery}}</h4>
                                <div class="product-actions">
                                    <button class="btn-edit" title="Edit quantity">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn-remove" title="Remove item">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-specs">
                                <div class="spec-item">
                                    <i class="bx bx-shape-circle"></i>
                                    <span class="spec-label">Shape:</span>
                                    <span class="spec-value">{{$row->shape}}</span>
                                </div>
                                <div class="spec-item">
                                    <i class="bx bx-ruler"></i>
                                    <span class="spec-label">Size:</span>
                                    <span class="spec-value">{{$row->size}}</span>
                                </div>
                            </div>
                            <div class="quantity-control">
                                <label class="quantity-label">Quantity:</label>
                                <div class="quantity-input-wrapper">
                                    <button class="qty-btn minus" onclick="updateQuantity({{$index}}, -1)">
                                        <i class="bx bx-minus"></i>
                                    </button>
                                    <input type="number" 
                                           class="quantity-input" 
                                           id="qty-{{$index}}"
                                           step="1" 
                                           value="{{$row->count}}" 
                                           min="1" 
                                           readonly>
                                    <button class="qty-btn plus" onclick="updateQuantity({{$index}}, 1)">
                                        <i class="bx bx-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                @if(count($detail) == 0)
                    <div class="empty-cart">
                        <div class="empty-icon">
                            <i class="bx bx-shopping-bag"></i>
                        </div>
                        <h4>No batteries selected</h4>
                        <p>Scan QR codes to add batteries to your selection</p>
                    </div>
                @endif
            </div>
        </section>
    </div>
</div>

<script>
function updateQuantity(index, change) {
    const input = document.getElementById(`qty-${index}`);
    let currentValue = parseInt(input.value);
    let newValue = currentValue + change;
    
    if (newValue >= 1) {
        input.value = newValue;
        // Add animation effect
        input.classList.add('quantity-updated');
        setTimeout(() => {
            input.classList.remove('quantity-updated');
        }, 300);
    }
}

// Add remove functionality
document.querySelectorAll('.btn-remove').forEach((btn, index) => {
    btn.addEventListener('click', function() {
        const productCard = document.getElementById(`product-${index}`);
        productCard.classList.add('removing');
        setTimeout(() => {
            productCard.remove();
            updateCartSummary();
        }, 300);
    });
});

function updateCartSummary() {
    const remainingItems = document.querySelectorAll('.product-card').length;
    const totalItemsSpan = document.querySelector('.total-items');
    if (totalItemsSpan) {
        totalItemsSpan.textContent = `${remainingItems} items`;
    }
}
</script>
