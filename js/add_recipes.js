// Ingredients alanında enter tuşuna basıldığında yeni bir li ekleyen fonksiyon
document.getElementById('ingredients').addEventListener('keydown', function(event) {
    // Enter tuşu (keyCode: 13) basıldığında ve shift tuşu basılı değilken
    if (event.keyCode === 13 && !event.shiftKey) {
        event.preventDefault(); // Enter'ın varsayılan davranışını engelle
        
        // Ingredients alanını seç
        var textarea = event.target;
        
        // Ingredients alanındaki metni al ve satırlara ayır
        var text = textarea.value;
        var lines = text.split('\n');
        
        // Metnin sonuna yeni bir li ekle
        lines.push('');
        
        // Yeni metni tekrar textarea'ya yerleştir
        textarea.value = lines.join('\n');
    }
});