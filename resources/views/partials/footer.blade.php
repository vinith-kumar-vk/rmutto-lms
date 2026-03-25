{{-- ═══ SHARED FOOTER ═══ --}}
<footer class="shared-footer-old">
    <div class="footer-inner-old">
        <div class="footer-logo-section">
            <div class="logo-circle-old">
                <img src="{{ asset('images/icons/logo.svg') }}" alt="Logo">
            </div>
            <p class="footer-tagline-old">Learn anytime and anywhere<br>from IL2 career skills</p>
        </div>

        <div class="footer-links-container-old">
            <div class="footer-col-old">
                <a href="#">Teach on IL2</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">Help and Support</a>
            </div>
            <div class="footer-col-old">
                <a href="#">Terms</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Cookies Policy</a>
                <a href="#">Career</a>
            </div>
        </div>

        <div class="footer-right-old">
            <select class="footer-lang-old">
                <option>English</option>
                <option>Thai</option>
            </select>
            
            <div class="social-icons-old">
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="Facebook"></a>
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg" alt="Instagram"></a>
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6f/Logo_of_Twitter.svg" alt="Twitter"></a>
            </div>

            <div class="app-badges-old">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="App Store">
            </div>
        </div>
    </div>
</footer>

<style>
/* ═══════════════════════════════════════════════════════════════
   FOOTER (RESTORED ORIGINAL LOOK)
   ═══════════════════════════════════════════════════════════════ */
.shared-footer-old {
    grid-column: 1 / -1;
    padding: 80px 40px;
    border-top: 1px solid #f1f5f9;
    width: 100%;
}

.footer-inner-old {
    max-width: 1440px;
    margin: 0 auto;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 100px;
    flex-wrap: wrap;
}

.footer-logo-section {
    flex: 1;
}

.logo-circle-old {
    width: 100px;
    height: 100px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    margin-bottom: 24px;
}

.logo-circle-old img {
    width: 70px;
}

.footer-tagline-old {
    font-size: 14px;
    color: #64748b;
    line-height: 1.6;
}

.footer-links-container-old {
    display: flex;
    justify-content: flex-start;
    gap: 80px;
    flex: 2;
}

.footer-col-old {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.footer-col-old a {
    font-size: 14px;
    color: #475569;
    text-decoration: none;
    transition: 0.2s;
}

.footer-col-old a:hover {
    color: #003a70;
}

.footer-right-old {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 24px;
}

.footer-lang-old {
    padding: 10px 24px;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    font-size: 14px;
    color: #64748b;
    min-width: 140px;
    background: #fff;
}

.social-icons-old {
    display: flex;
    gap: 16px;
}

.social-icons-old a img {
    width: 24px;
    height: 24px;
}

.app-badges-old {
    display: flex;
    gap: 12px;
    margin-top: 10px;
}

.app-badges-old img {
    height: 38px;
}

@media (max-width: 1024px) {
    .footer-inner-old { flex-direction: column; gap: 40px; }
    .footer-links-container-old { justify-content: flex-start; gap: 40px; flex-wrap: wrap; }
    .footer-right-old { align-items: flex-start; }
}

@media (max-width: 768px) {
    .shared-footer-old { padding: 40px 24px; }
    .footer-inner-old { 
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        gap: 40px;
    }
    .footer-links-container-old { 
        flex-direction: column;
        gap: 30px;
        width: 100%;
    }
    .footer-right-old { width: 100%; align-items: flex-start; }
    .app-badges-old { flex-direction: row; gap: 15px; align-items: center; }
    .app-badges-old img { height: 35px; }
}
</style>
