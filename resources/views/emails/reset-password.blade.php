@component('mail::message')
<style>
    .header {
        color: #2d3748;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .content {
        color: #4a5568;
        line-height: 1.6;
        margin-bottom: 16px;
    }
    .warning {
        color: #e53e3e;
        font-weight: 500;
    }
    .footer {
        color: #718096;
        font-size: 14px;
        margin-top: 30px;
    }
</style>

<div class="header">🔐 Permintaan Reset Password</div>

<div class="content">
    Halo! Kami menerima permintaan untuk mereset password akun Anda. Silakan klik tombol di bawah ini untuk melanjutkan proses reset password.
</div>

@component('mail::button', ['url' => $url, 'color' => 'primary'])
    Reset Password
@endcomponent

<div class="content">
    <span class="warning">⚠️ Penting:</span> Link ini hanya valid untuk <strong>60 menit</strong> sejak email ini dikirim. Jika link telah kedaluwarsa, Anda bisa meminta reset password kembali.
</div>

<div class="content">
    Jika Anda <strong>tidak</strong> melakukan permintaan ini, harap abaikan email ini atau <a href="mailto:{{ config('mail.support_email') }}?subject=Laporan%20Reset%20Password%20Tidak%20Dikenal">laporkan ke tim support kami</a> untuk keamanan akun Anda.
</div>

<div class="footer">
    Salam hangat,<br>
    <strong>{{ config('app.name') }}</strong><br>
    <small>Jika Anda membutuhkan bantuan, balas email ini atau hubungi kami di {{ config('app.contact_phone') }}</small>
</div>
@endcomponent