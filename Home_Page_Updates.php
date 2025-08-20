<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Updates</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: #2d5016;
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: fadeInDown 1s ease-out;
        }

        .updates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 20px;
        }

        .update-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
        }

        .update-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .update-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #4CAF50, #81C784);
        }

        .card-icon {
            display: none;
        }

        .photo-container {
            position: relative;
            margin-bottom: 20px;
            cursor: pointer;
            overflow: hidden;
            border-radius: 15px;
        }

        .photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            filter: brightness(0.9);
        }

        .photo:hover {
            filter: brightness(1.1);
            transform: scale(1.05);
        }

        .photo.expanded {
            transform: scale(1.4);
            z-index: 1000;
            position: relative;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(76, 175, 80, 0.8), rgba(129, 199, 132, 0.8));
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .photo-container:hover .photo-overlay {
            opacity: 1;
        }

        .overlay-text {
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            text-align: center;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .photo-container:hover .overlay-text {
            transform: translateY(0);
        }

        .card-title {
            color: #2d5016;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .card-description {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .expand-hint {
            position: absolute;
            bottom: 10px;
            right: 15px;
            background: rgba(76, 175, 80, 0.9);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-container:hover .expand-hint {
            opacity: 1;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .card-1 { animation-delay: 0.1s; }
        .card-2 { animation-delay: 0.3s; }
        .card-3 { animation-delay: 0.5s; }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            
            .updates-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .update-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>School Updates</h1>
        
        <div class="updates-grid">
            <div class="update-card card-1">
                <div class="card-icon">🏫</div>
                <div class="photo-container" onclick="toggleExpand(this)">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDQwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjZTNmMmZkIi8+CjxyZWN0IHg9IjUwIiB5PSI1MCIgd2lkdGg9IjMwMCIgaGVpZ2h0PSIxMDAiIGZpbGw9IiM0Zjc5YTQiIHJ4PSI1Ii8+Cjx0ZXh0IHg9IjIwMCIgeT0iMTA1IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0Ij5GbGFnIENlcmVtb255ICZhbXA7IFBsZWRnZTwvdGV4dD4KPHN2ZyB4PSIxMDAiIHk9IjMwIiB3aWR0aD0iMjAiIGhlaWdodD0iMjAiPgo8Y2lyY2xlIGN4PSIxMCIgY3k9IjEwIiByPSI4IiBmaWxsPSIjZmZkNzAwIi8+CjwvU3ZnPgo8L3N2Zz4=" alt="Flag Ceremony" class="photo">
                    <div class="photo-overlay">
                        <div class="overlay-text">📸 Click to expand</div>
                    </div>
                    <div class="expand-hint">Click to expand</div>
                </div>
                <h3 class="card-title">Morning Flag Ceremony and National Pledge</h3>
                <p class="card-description">Students gather for our daily flag ceremony, demonstrating patriotism and school unity. This meaningful tradition starts each day with students pledging their commitment to our nation and school values, fostering a sense of community and national pride among our young learners.</p>
            </div>

            <div class="update-card card-2">
                <div class="card-icon">🎒</div>
                <div class="photo-container" onclick="toggleExpand(this)">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDQwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjZjBmOGZmIi8+CjxyZWN0IHg9IjUwIiB5PSI0MCIgd2lkdGg9IjMwMCIgaGVpZ2h0PSIxMjAiIGZpbGw9IiM2MzY2ZjEiIHJ4PSIxMCIvPgo8dGV4dCB4PSIyMDAiIHk9IjEwNSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZmlsbD0id2hpdGUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNiI+U2Nob29sIEJhZyBEaXN0cmlidXRpb248L3RleHQ+CjxyZWN0IHg9IjgwIiB5PSI3MCIgd2lkdGg9IjMwIiBoZWlnaHQ9IjQwIiBmaWxsPSIjMzMzNjcyIiByeD0iMyIvPgo8cmVjdCB4PSIxMjAiIHk9IjcwIiB3aWR0aD0iMzAiIGhlaWdodD0iNDAiIGZpbGw9IiNmZjY5YjQiIHJ4PSIzIi8+CjxyZWN0IHg9IjE2MCIgeT0iNzAiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIgZmlsbD0iIzMzMzY3MiIgcng9IjMiLz4KPHJlY3QgeD0iMjAwIiB5PSI3MCIgd2lkdGg9IjMwIiBoZWlnaHQ9IjQwIiBmaWxsPSIjZmY2OWI0IiByeD0iMyIvPgo8cmVjdCB4PSIyNDAiIHk9IjcwIiB3aWR0aD0iMzAiIGhlaWdodD0iNDAiIGZpbGw9IiMzMzM2NzIiIHJ4PSIzIi8+CjxyZWN0IHg9IjI4MCIgeT0iNzAiIHdpZHRoPSIzMCIgaGVpZ2h0PSI0MCIgZmlsbD0iI2ZmNjliNCIgcng9IjMiLz4KPC9zdmc+" alt="School Bag Distribution" class="photo">
                    <div class="photo-overlay">
                        <div class="overlay-text">📸 Click to expand</div>
                    </div>
                    <div class="expand-hint">Click to expand</div>
                </div>
                <h3 class="card-title">Annual School Bag Distribution Program</h3>
                <p class="card-description">A heartwarming moment as students receive their new school bags! This community-supported initiative ensures every child has the proper supplies for their educational journey. The joy and excitement on their faces reflect the positive impact of educational support programs in our community.</p>
            </div>

            <div class="update-card card-3">
                <div class="card-icon">🌟</div>
                <div class="photo-container" onclick="toggleExpand(this)">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDQwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjZjBmZGY0Ii8+CjxyZWN0IHg9IjUwIiB5PSI0MCIgd2lkdGg9IjMwMCIgaGVpZ2h0PSIxMjAiIGZpbGw9IiMxNmE0NGEiIHJ4PSIxMCIvPgo8dGV4dCB4PSIyMDAiIHk9Ijk1IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0Ij5FYXJ0aHF1YWtlIERyaWxsPC90ZXh0Pgo8dGV4dCB4PSIyMDAiIHk9IjExNSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZmlsbD0id2hpdGUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCI+U2FmZXR5IFByZXBhcmF0aW9uPC90ZXh0Pgo8Y2lyY2xlIGN4PSIxMDAiIGN5PSIxMzAiIHI9IjgiIGZpbGw9IiNmZmJkMDAiLz4KPGNpcmNsZSBjeD0iMTMwIiBjeT0iMTMwIiByPSI4IiBmaWxsPSIjZmZiZDAwIi8+CjxjaXJjbGUgY3g9IjE2MCIgY3k9IjEzMCIgcj0iOCIgZmlsbD0iI2ZmYmQwMCIvPgo8Y2lyY2xlIGN4PSIxOTAiIGN5PSIxMzAiIHI9IjgiIGZpbGw9IiNmZmJkMDAiLz4KPGNpcmNsZSBjeD0iMjIwIiBjeT0iMTMwIiByPSI4IiBmaWxsPSIjZmZiZDAwIi8+CjxjaXJjbGUgY3g9IjI1MCIgY3k9IjEzMCIgcj0iOCIgZmlsbD0iI2ZmYmQwMCIvPgo8Y2lyY2xlIGN4PSIyODAiIGN5PSIxMzAiIHI9IjgiIGZpbGw9IiNmZmJkMDAiLz4KPGNpcmNsZSBjeD0iMzEwIiBjeT0iMTMwIiByPSI4IiBmaWxsPSIjZmZiZDAwIi8+CjwvU3ZnPgo=" alt="Earthquake Drill" class="photo">
                    <div class="photo-overlay">
                        <div class="overlay-text">📸 Click to expand</div>
                    </div>
                    <div class="expand-hint">Click to expand</div>
                </div>
                <h3 class="card-title">Emergency Preparedness: Earthquake Safety Drill</h3>
                <p class="card-description">Students participate in our monthly safety drill, learning crucial emergency procedures. Through these well-organized drills, our students develop confidence and knowledge in emergency response, ensuring they're prepared to protect themselves and help others during unexpected situations.</p>
            </div>
        </div>
    </div>

    <script>
        function toggleExpand(photoContainer) {
            const photo = photoContainer.querySelector('.photo');
            const allPhotos = document.querySelectorAll('.photo');
            
            // Close all other expanded photos
            allPhotos.forEach(p => {
                if (p !== photo) {
                    p.classList.remove('expanded');
                }
            });
            
            // Toggle the clicked photo
            photo.classList.toggle('expanded');
        }

        // Close expanded photo when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.photo-container')) {
                const expandedPhotos = document.querySelectorAll('.photo.expanded');
                expandedPhotos.forEach(photo => {
                    photo.classList.remove('expanded');
                });
            }
        });

        // Add some interactive sparkle effects
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.update-card');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.background = 'linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.background = 'white';
                });
            });
        });
    </script>
</body>
</html>