<?php
// welcome.php
// Simple LinkedIn-style welcome/home page.
// Note: this file references the uploaded image at /mnt/data/Linkedin.jpg for the header hero.
session_start();
// For demo purposes we'll set a username if not present
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

$user = htmlspecialchars($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Welcome — LinkedIn</title>
<style>
  :root{--blue:#0a66c2;--muted:#6b6b6b;--card:#fff;--bg:#f3f2ef}
  *{box-sizing:border-box}
  body{margin:0;font-family:Arial,Helvetica,sans-serif;background:var(--bg);color:#111}
  header{background:#fff;border-bottom:1px solid #e6e6e6}
  .topbar{max-width:1120px;margin:0 auto;display:flex;align-items:center;gap:20px;padding:12px}
  .brand{display:flex;align-items:center;gap:12px}
  .brand img{height:26px}
  .search{flex:1}
  .search input{width:100%;padding:9px 12px;border-radius:6px;border:1px solid #ddd}
  nav{display:flex;gap:14px}
  nav a{color:var(--muted);text-decoration:none;font-size:14px}

  .layout{max-width:1120px;margin:24px auto;display:grid;grid-template-columns:250px 1fr 300px;gap:20px}
  .card{background:var(--card);padding:18px;border-radius:8px;box-shadow:0 1px 2px rgba(0,0,0,0.06)}
  .me{
    background-color:white;
    text-decoration:none;
  }
  .me:hover{
    background:blue;
    color:white;
    transition:1s;
    border-radius:5px;
    padding:3px;
  }

  /* left sidebar */
  .profile-card{text-align:center}
  .profile-card img.avatar{width:72px;height:72px;border-radius:50%;object-fit:cover;margin-bottom:10px}
  .profile-card h3{margin:8px 0 4px;font-size:18px}
  .profile-card p{margin:0;color:var(--muted);font-size:14px}
  .profile-actions{margin-top:12px;display:flex;gap:8px;justify-content:center}
  .btn{height:20%; padding:8px 12px;border-radius:20px;border:1px solid #ddd;background:#fff;cursor:pointer}
  .btnx{width:40%; height:20%; border:1px solid #ffffffff;background:#4158abff; color:white; cursor:pointer }

  /* feed */
  .welcome-card{display:flex;gap:18px;align-items:center}
  .hero{flex:1;padding:18px;border-radius:8px;background:linear-gradient(180deg,rgba(10,102,194,0.06),rgba(10,102,194,0.02));}
  .hero h1{margin:0 0 6px;font-size:22px}
  .hero p{margin:0;color:var(--muted)}
  .post-box{margin-top:14px;padding:12px;border-radius:8px;border:1px solid #e6e6e6;background:#fff}
  .post-box textarea{width:100%;border:0;resize:none;font-size:15px;padding:8px}
  .post-actions{display:flex;gap:8px;margin-top:10px}
  .post-actions .btn-primary{background:var(--blue);color:#fff;border:none}

  /* right sidebar */
  .people-card h4{margin:0 0 8px}
  .people{display:flex;flex-direction:column;gap:10px}
  .person{display:flex;gap:10px;align-items:center}
  .person img{width:44px;height:44px;border-radius:6px;object-fit:cover}
  .muted{color:var(--muted);font-size:13px}

  footer{max-width:1120px;margin:30px auto;text-align:center;color:var(--muted);font-size:13px}

  /* responsive */
  @media (max-width:980px){.layout{grid-template-columns:1fr;padding:0 16px} .topbar{padding:10px}}
  body{
    background: #e6e3e3ff;;
  }
</style>
</head>
<body>

<header>
  <div class="topbar">
    <div class="brand">
      <!-- logo uses uploaded file path; hosting environment will transform this path to a URL -->
      <img src="pic/Linkedin_logo.svg" alt="LinkedIn logo" style="height:34px;border-radius:6px;object-fit:cover">
    </div>
    <div class="search"><input type="search" placeholder="Search"></div>
    <nav>
      <a href="#" class='me'>Home</a>
      <a href="select.php" class='me'>Users</a>
      <a href="#" class='me'>Jobs</a>
      <a href="#" class='me'>Messaging</a>
      <a href="#" class='me'>Notifications</a>
      <a href="logout.php" class='me'>Logout</a>

    </nav>
  </div>
</header>

<main class="layout">
  <aside>
    <div class="card profile-card">
      <img class="avatar" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="avatar">
      <h3><?php echo $user; ?></h3>
      <p class="muted">Student at University</p>
      <div class="profile-actions">
        <button class="btnx">View Profile</button>
        <button class="btnx">More</button>
      </div>
    </div>

    <div style="height:12px"></div>

  
  </aside>

  <section>
    <div class="card welcome-card">
      <div class="hero">
        <h1>Welcome, <?php echo $user; ?> 👋</h1>
        <p>Here’s what’s happening in your professional world.</p>
        <div style="margin-top:12px;text-align:right">
          <button class="btnx">Start a post</button>
        </div>
      </div>
    </div>

  

  

  </section>

  <aside>
    <div class="card people-card">
      <h4 style="margin-top:0">People you may know</h4>
      <div class="people">
        <div class="person"><img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"><div><strong>Jane Smith</strong><div class="muted">5 mutual connections</div></div></div>
        <div class="person"><img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"><div><strong>Mark Lee</strong><div class="muted">React Developer</div></div></div>
      </div>
      <div style="margin-top:12px;text-align:center"><button class="btn">See all</button></div>
    </div>

    <div style="height:12px"></div>

   
  </aside>
</main>

<footer>
  LinkedIn prototype — not affiliated with LinkedIn. • Help • Privacy & Terms
</footer>

</body>
</html>
