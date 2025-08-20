<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DepEd Articles</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: #f5f7fa;
      padding: 20px;
      margin: 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .header {
      color: #1e3a8a;
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 30px;
      padding-left: 10px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .header img {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }

    .article-card {
      display: flex;
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      transition: all 0.4s ease;
    }

    .article-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .image-section {
      flex: 1;
      overflow: hidden;
    }

    .article-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      min-height: 400px;
      transition: transform 0.6s ease;
    }

    .article-card:hover .article-image {
      transform: scale(1.05);
    }

    .content-section {
      flex: 1;
      background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
      color: white;
      padding: 60px 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
    }

    .article-title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 30px;
      text-align: center;
    }

    .divider {
      width: 100px;
      height: 3px;
      background: white;
      margin: 0 auto 30px;
      border-radius: 2px;
    }

    .read-more {
      text-align: center;
    }

    .read-more-link {
      color: white;
      text-decoration: none;
      font-size: 1.1rem;
      font-style: italic;
      padding: 10px 20px;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 25px;
      display: inline-block;
      transition: 0.3s;
    }

    .read-more-link:hover {
      background: rgba(255, 255, 255, 0.1);
      border-color: white;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
      .article-card {
        flex-direction: column;
      }

      .content-section {
        padding: 40px 30px;
      }

      .article-title {
        font-size: 1.5rem;
      }

      .header {
        font-size: 2rem;
        flex-direction: column;
        align-items: flex-start;
      }

      .header img {
        width: 40px;
        height: 40px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="logo.jpg" alt="School Logo" />
      Lucena South II Elementary School
    </div>

    <div class="article-card">
      <div class="image-section">
        <img src="https://via.placeholder.com/600x400?text=DepEd+Building" alt="DepEd Building" class="article-image" />
      </div>

      <div class="content-section">
        <h2 class="article-title">
          Mas malawak na suporta sa edukasyon, isinusulong ni PBBM; DepEd, pinaigting ang mga reporma
        </h2>

        <div class="divider"></div>

        <div class="read-more">
          <a href="https://www.deped.gov.ph/2025/06/24/mas-malawak-na-suporta-sa-edukasyon-isinusulong-ni-pbbm-deped-pinaigting-ang-mga-reporma/" class="read-more-link">Magbasa pa...</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
