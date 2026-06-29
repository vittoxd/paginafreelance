<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<body style="margin:0;padding:0;background:#0F1117;font-family:sans-serif">
  <div style="max-width:600px;margin:auto;padding:24px">

    <div style="background:#1A1F2E;border-radius:12px 12px 0 0;padding:20px 24px;display:flex;align-items:center;gap:12px">
      <span style="background:linear-gradient(135deg,#6C63FF,#00D4FF);color:#fff;font-weight:800;padding:6px 14px;border-radius:8px;font-size:16px;letter-spacing:1px">KS</span>
      <span style="color:#F0F0F8;font-size:18px;font-weight:700">Kodex Studio</span>
    </div>

    <div style="background:#1A1F2E;padding:28px;border:1px solid #2A3142;border-top:none;border-radius:0 0 12px 12px">
      <h2 style="margin:0 0 20px;color:#F0F0F8;font-size:20px">📋 Nueva solicitud de cotización</h2>

      <table style="width:100%;border-collapse:collapse;font-size:14px">
        <tr><td style="padding:7px 0;color:#818CF8;width:120px">Plan</td><td style="padding:7px 0;font-weight:600;color:#F0F0F8">{{ $datos['service'] ?? '—' }}</td></tr>
        <tr><td style="padding:7px 0;color:#818CF8">Nombre</td><td style="padding:7px 0;color:#F0F0F8">{{ $datos['name'] }}</td></tr>
        <tr><td style="padding:7px 0;color:#818CF8">Email</td><td style="padding:7px 0;color:#F0F0F8">{{ $datos['email'] }}</td></tr>
        <tr><td style="padding:7px 0;color:#818CF8">WhatsApp</td><td style="padding:7px 0;color:#F0F0F8">{{ $datos['phone'] ?? '—' }}</td></tr>
      </table>

      <div style="margin-top:20px;background:#0F1117;border:1px solid #2A3142;border-radius:8px;padding:16px">
        <p style="margin:0 0 8px;color:#818CF8;font-size:12px;text-transform:uppercase;letter-spacing:.5px">Detalles del proyecto</p>
        <p style="margin:0;font-size:14px;color:#94A3B8;line-height:1.6">{{ $datos['details'] }}</p>
      </div>

      <div style="margin-top:24px;text-align:center">
        <a href="http://localhost/portafolio-freelance/public" style="display:inline-block;background:linear-gradient(135deg,#6C63FF,#00D4FF);color:#fff;padding:12px 28px;border-radius:50px;text-decoration:none;font-weight:700;font-size:14px">
          Ver panel admin →
        </a>
      </div>
    </div>

    <p style="text-align:center;color:#64748B;font-size:12px;margin-top:16px">Kodex Studio · Rancagua, Chile</p>
  </div>
</body>
</html>
