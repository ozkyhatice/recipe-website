document.getElementById('ingredients').addEventListener('keydown', function(event) {
    if (event.keyCode === 13 && !event.shiftKey) {
        event.preventDefault(); 
        
        var textarea = event.target;
        
        var text = textarea.value;
        var lines = text.split('\n');
        
        // Metnin sonuna yeni bir li ekle
        lines.push('');
        
        // Yeni metni tekrar textarea'ya yerleştir
        textarea.value = lines.join('\n');
    }
});