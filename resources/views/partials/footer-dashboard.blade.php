{{-- ═══ DASHBOARD FOOTER (WHITE CARD) ═══ --}}
<footer class="shared-footer-dashboard">
    <div class="f-brand">
        <div class="f-logo-circle"><img src="{{ asset('images/icons/logo.svg') }}" alt="Logo"></div>
        <p>Learn anytime and anywhere from IL2 career skills</p>
    </div>
    <div class="f-col">
        <ul>
            <li><a href="#">Teach on IL2</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Help and Support</a></li>
        </ul>
    </div>
    <div class="f-col">
        <ul>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Cookies Policy</a></li>
            <li><a href="#">Career</a></li>
        </ul>
    </div>
    <div class="f-right">
        <select class="f-lang-select"><option>English</option><option>Thai</option></select>
        <div class="f-socials">
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"></a>
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg"></a>
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Twitter_Logo.png"></a>
        </div>
        <div class="f-apps">
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"></a>
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg"></a>
        </div>
    </div>
</footer>

<style>
/* ═══════════════════════════════════════════════════════════════
   FOOTER (DASHBOARD ONLY - WHITE CARD)
   ═══════════════════════════════════════════════════════════════ */
.shared-footer-dashboard {
    grid-column: 2; /* SHORT VERSION - ONLY SPANS CONTENT COLUMN */
    background: #fff;
    border-radius: 26px;
    padding: 60px 40px;
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
    gap: 40px;
    flex-wrap: wrap;
    box-shadow: 0 -4px 20px rgba(0,0,0,0.01);
}

.f-brand { flex: 1.2; min-width: 250px; }
.f-logo-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}
.f-logo-circle img { height: 35px; }
.f-brand p { color: #64748b; font-size: 14.5px; line-height: 1.6; }

.f-col { flex: 0.6; min-width: 150px; }
.f-col ul { list-style: none; padding: 0; margin: 0; }
.f-col ul li { margin-bottom: 15px; }
.f-col ul li a { text-decoration: none; color: #475569; font-size: 14.5px; transition: 0.2s; }
.f-col ul li a:hover { color: #003a70; }

.f-right { flex: 1; min-width: 250px; display: flex; flex-direction: column; align-items: flex-end; gap: 20px; }
.f-lang-select { 
    padding: 10px 15px; border-radius: 25px; border: 1px solid #e2e8f0; background: #fff; 
    color: #475569; font-size: 14px; outline: none; cursor: pointer; width: 140px;
}
.f-socials { display: flex; gap: 12px; }
.f-socials a { 
    width: 38px; height: 38px; border-radius: 50%; background: #f1f5f9; 
    display: flex; align-items: center; justify-content: center; transition: 0.2s; 
}
.f-socials a:hover { transform: translateY(-3px); background: #e2e8f0; }
.f-socials a img { height: 18px; width: 18px; object-fit: contain; }
.f-apps { display: flex; gap: 10px; }
.f-apps a img { height: 38px; }

@media (max-width: 1024px) {
    .shared-footer-dashboard { 
        grid-column: 1 / -1; 
        flex-direction: row; 
        justify-content: space-between;
        align-items: flex-start;
        text-align: left;
    }
}

@media (max-width: 768px) {
    .shared-footer-dashboard {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        gap: 35px;
        padding: 40px 24px;
        border-radius: 20px;
    }
    .f-brand { width: 100%; margin-bottom: 0; }
    .f-logo-circle { width: 50px; height: 50px; margin-bottom: 15px; }
    .f-right { align-items: flex-start; width: 100%; }
    .f-apps { flex-direction: row; gap: 15px; align-items: center; }
    .f-apps img { height: 35px; }
}
</style>
