<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources Video Gallery - Finetouch Africa LTD</title>
    <link rel="icon" href="images/fav32x32.png" type="image/png">
    
    <!-- CDN Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #ff0000;
            --accent-color: #14ae0c;
            --dark-bg: #121212;
            --light-text: #f8f9fa;
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-hover: rgba(255, 255, 255, 0.1);
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, var(--primary-color), var(--dark-bg));
            margin: 0;
            padding: 0;
            color: var(--light-text);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
        }

        .logo {
            display: block;
            margin: 0 auto;
            max-width: 280px;
            padding: 0px 0;
        }

        h1 {
            text-align: center;
            color: var(--light-text);
            font-size: 2.5rem;
            margin: 20px 0 30px;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .search-container {
            position: relative;
            margin-bottom: 30px;
            width: 100%;
        }

        #searchBox {
            width: 100%;
            padding: 15px 20px;
            font-size: 1.1rem;
            border: none;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--light-text);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        #searchBox:focus {
            outline: none;
            box-shadow: 0 0 0 3px var(--secondary-color);
            background: rgba(255, 255, 255, 0.15);
        }

        #searchBox::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .search-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .video-card {
            background: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            height: fit-content;
        }

        .video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
            background: var(--card-hover);
        }

        .video-card h2 {
            font-size: 1.2rem;
            padding: 15px;
            margin: 0;
            font-weight: 600;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            background: #000;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0;
        }

        .load-more-container {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }

        #loadMore {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #loadMore:hover {
            background: #14ae0c;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        }

        #loadMore:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        #scrollToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--accent-color);
            color: white;
            border: none;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        #scrollToTop:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
        }

        footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: #ddd;
            font-size: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px;
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
                border-radius: 10px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .video-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            #scrollToTop {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="images/maillogo.png" alt="Finetouch Africa LTD Logo" class="logo">
        <h1>Resources Video Gallery</h1>
        
        <div class="search-container">
            <input type="text" id="searchBox" placeholder="Search videos...">
            <div class="search-icon">
                <i class="fas fa-search"></i>
            </div>
        </div>
        
        <div class="video-grid" id="videoGrid"></div>
        
        <div class="load-more-container">
            <button id="loadMore">
                <span class="load-text">Load More</span>
                <span class="loading-spinner" style="display: none;"></span>
            </button>
        </div>
        
        <footer>
            Regards, IT - Finetouch Africa LTD
        </footer>
    </div>
    
    <button id="scrollToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- CDN JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
<script>
    // Video data (server-generated PHP block remains the same)
    const videoData = [
        <?php
            $dir = 'videos/';
            $files = scandir($dir);
            $videoCount = 0;
            
            foreach($files as $file) {
                $file_info = pathinfo($file);
                if($file != '.' && $file != '..' && isset($file_info['extension']) && in_array($file_info['extension'], ['mp4', 'webm', 'ogg'])) {
                    if ($videoCount > 0) echo ",";
                    echo json_encode([
                        'title' => $file_info['filename'],
                        'src' => $dir . $file,
                        'type' => 'video/' . $file_info['extension']
                    ]);
                    $videoCount++;
                }
            }
        ?>
    ];

    // Global variables
    let currentPage = 1;
    const videosPerPage = 6;
    let filteredVideos = [...videoData];
    let isLoading = false;

    // DOM elements
    const videoGrid = document.getElementById('videoGrid');
    const searchBox = document.getElementById('searchBox');
    const loadMoreButton = document.getElementById('loadMore');
    const scrollToTopButton = document.getElementById('scrollToTop');
    const loadText = document.querySelector('.load-text');
    const loadingSpinner = document.querySelector('.loading-spinner');

    // Ensure backdrop exists (create once)
    function ensureBackdrop() {
        let b = document.getElementById('videoBackdrop');
        if (!b) {
            b = document.createElement('div');
            b.id = 'videoBackdrop';
            document.body.appendChild(b);

            // Optional: clicking backdrop will pause any playing video
            b.addEventListener('click', () => {
                const playing = Array.from(document.querySelectorAll('video'))
                    .find(v => !v.paused && !v.ended);
                if (playing) playing.pause();
            });
        }
        return b;
    }

    // Show backdrop (fade in)
    function showBackdrop() {
        const b = ensureBackdrop();
        // make sure it is visible
        b.classList.add('show');
    }

    // Hide backdrop (fade out), but only if no portrait video is still playing
    function hideBackdropIfNoPortraitPlaying() {
        const stillPlayingPortrait = Array.from(document.querySelectorAll('video')).some(v => {
            try {
                return !v.paused && !v.ended && v.videoHeight > v.videoWidth;
            } catch (e) {
                return false;
            }
        });

        const b = document.getElementById('videoBackdrop');
        if (!b) return;
        if (!stillPlayingPortrait) {
            b.classList.remove('show');
            // optionally remove after transition - keep element for reuse
            setTimeout(() => {
                if (!b.classList.contains('show')) {
                    // keep the element but hidden; no DOM removal needed
                }
            }, 300);
        }
    }

    // Initialize the page
    document.addEventListener('DOMContentLoaded', function() {
        // Get the search query from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');
        
        // If a search query exists in the URL, apply it
        if (searchQuery) {
            searchBox.value = searchQuery;
            filterVideos(searchQuery);
        } else {
            filteredVideos = [...videoData];
        }
        
        // Add event listeners
        searchBox.addEventListener('input', handleSearch);
        loadMoreButton.addEventListener('click', loadMoreVideos);
        window.addEventListener('scroll', toggleScrollToTopButton);
        scrollToTopButton.addEventListener('click', scrollToTop);
        
        // Initialize video grid with first set of videos
        renderVideos();
    });

    // Handle search input
    function handleSearch() {
        const query = searchBox.value.toLowerCase();
        currentPage = 1;
        videoGrid.innerHTML = '';
        
        // Update URL with search query
        const url = new URL(window.location);
        if (query) {
            url.searchParams.set('search', query);
        } else {
            url.searchParams.delete('search');
        }
        window.history.replaceState({}, '', url);
        
        filterVideos(query);
    }

    // Filter videos based on search query
    function filterVideos(query) {
        if (!query) {
            filteredVideos = [...videoData];
        } else {
            filteredVideos = videoData.filter(video => 
                video.title.toLowerCase().includes(query)
            );
        }
        
        renderVideos();
    }
    
    function updateLoadMoreText() {
        const remaining = filteredVideos.length - (currentPage * videosPerPage);
    
        if (remaining > 0) {
            loadText.textContent = `Load ${Math.min(remaining, videosPerPage)} more`;
            loadMoreButton.style.display = 'flex';
        } else {
            loadMoreButton.style.display = 'none';
        }
    }


    // Render videos for the current page
    function renderVideos() {
        if (filteredVideos.length === 0) {
            videoGrid.innerHTML = '<div class="no-results">No videos found matching your search.</div>';
            loadMoreButton.style.display = 'none';
            return;
        }
    
        // Calculate start and end using currentPage so we only render the new slice
        const startIndex = (currentPage - 1) * videosPerPage;
        const endIndex = Math.min(currentPage * videosPerPage, filteredVideos.length);
        const videosToRender = filteredVideos.slice(startIndex, endIndex);
    
        // If it's the first page, clear existing content; otherwise append only the new items
        if (currentPage === 1) {
            videoGrid.innerHTML = '';
        }
    
        videosToRender.forEach(video => {
            const videoCard = createVideoCard(video);
            videoGrid.appendChild(videoCard);
        });
    
        // Show or hide load more button
        if (endIndex >= filteredVideos.length) {
            loadMoreButton.style.display = 'none';
        } else {
            loadMoreButton.style.display = 'flex';
        }
        
        updateLoadMoreText();
    }

    
    // Load more videos when the button is clicked
    function loadMoreVideos() {
        if (isLoading) return;
    
        isLoading = true;
        loadText.textContent = 'Loading...';
        loadingSpinner.style.display = 'inline-block';
        loadMoreButton.disabled = true;
    
        setTimeout(() => {
            currentPage++;
            renderVideos();
    
            isLoading = false;
            loadingSpinner.style.display = 'none';
            loadMoreButton.disabled = false;
        }, 800);
    }



    // Create a video card element
    function createVideoCard(video) {
        const card = document.createElement('div');
        card.className = 'video-card';
        card.setAttribute('data-title', video.title.toLowerCase());
        
        const title = document.createElement('h2');
        title.textContent = video.title;
        
        const videoContainer = document.createElement('div');
        videoContainer.className = 'video-container';
        
        const videoElement = document.createElement('video');
        videoElement.controls = true;
        videoElement.preload = 'metadata'; // Only load metadata initially
        
        const source = document.createElement('source');
        source.src = video.src;
        source.type = video.type;
        
        videoElement.appendChild(source);
        videoElement.appendChild(document.createTextNode('Your browser does not support the video tag.'));
        
        // Pause other videos when this one plays AND handle portrait/full-frame behavior
        videoElement.addEventListener('play', function() {
            pauseOtherVideos(videoElement);
            handlePlayExpand(videoElement);
        });
        
        // When playback stops (pause/ended) restore to original layout
        videoElement.addEventListener('pause', function() {
            resetVideoSize(videoElement);
            hideBackdropIfNoPortraitPlaying();
        });
        videoElement.addEventListener('ended', function() {
            resetVideoSize(videoElement);
            hideBackdropIfNoPortraitPlaying();
        });

        // Save original computed layout info once metadata is available
        videoElement.addEventListener('loadedmetadata', function() {
            try {
                const computed = window.getComputedStyle(videoElement.parentElement);
                videoElement.parentElement.dataset.origPaddingTop = computed.paddingTop || '56.25%';
            } catch (e) {
                videoElement.parentElement.dataset.origPaddingTop = '56.25%';
            }
            if (!card.dataset.origOverflow) {
                card.dataset.origOverflow = card.style.overflow || 'hidden';
            }
        }, { once: true });
        
        videoContainer.appendChild(videoElement);
        
        card.appendChild(title);
        card.appendChild(videoContainer);
        
        return card;
    }

    // Pause all videos except the one currently playing
    function pauseOtherVideos(currentVideo) {
        const allVideos = document.querySelectorAll('video');
        allVideos.forEach(video => {
            if (video !== currentVideo && !video.paused) {
                video.pause();
            }
        });
    }

    // Expand portrait videos so no part is hidden while playing
    function handlePlayExpand(videoElement) {
        const card = videoElement.closest('.video-card');
        const videoContainer = videoElement.parentElement;

        // Save original styles the first time
        if (!videoElement.dataset.origStylesSaved) {
            videoElement.dataset.origObjectFit = videoElement.style.objectFit || '';
            videoElement.dataset.origWidth = videoElement.style.width || '';
            videoElement.dataset.origHeight = videoElement.style.height || '';
            const computed = window.getComputedStyle(videoContainer);
            videoContainer.dataset.origPaddingTop = videoContainer.dataset.origPaddingTop || computed.paddingTop || '56.25%';
            card.dataset.origOverflow = card.style.overflow || card.dataset.origOverflow || 'hidden';
            card.dataset.origZIndex = card.style.zIndex || '';
            videoElement.dataset.origStylesSaved = '1';
        }

        function applyLayout() {
            // If portrait (taller than wide) then expand to show full video
            if (videoElement.videoHeight > videoElement.videoWidth) {
                // Show the subtle backdrop
                showBackdrop();

                // Allow the card to overflow so the full portrait can appear
                card.style.overflow = 'visible';
                card.style.zIndex = '9999'; // above backdrop

                // remove the fixed-aspect padding on the container
                videoContainer.style.paddingTop = '0';

                // ensure the video fits within viewport height and isn't cropped
                videoElement.style.objectFit = 'contain';
                videoElement.style.width = 'auto';
                videoElement.style.maxWidth = '100vw';
                // use viewport-height limit so tall videos are fully visible
                videoElement.style.height = '80vh';
                videoElement.style.maxHeight = 'calc(100vh - 100px)';

                // center the video horizontally within the card/container
                videoElement.style.display = 'block';
                videoElement.style.margin = '0 auto';
                videoElement.style.position = 'relative';
            } else {
                // Not portrait: keep normal sizing but ensure it shows without cropping
                videoElement.style.objectFit = 'contain';
                videoContainer.style.paddingTop = videoContainer.dataset.origPaddingTop || '56.25%';
                videoElement.style.width = '100%';
                videoElement.style.height = '100%';
                card.style.overflow = card.dataset.origOverflow || 'hidden';
                card.style.zIndex = card.dataset.origZIndex || '';
                // hide backdrop if no other portrait playing
                hideBackdropIfNoPortraitPlaying();
            }
        }

        // If metadata already available apply immediately, otherwise wait for it
        if (videoElement.videoWidth && videoElement.videoHeight) {
            applyLayout();
        } else {
            videoElement.addEventListener('loadedmetadata', applyLayout, { once: true });
        }
    }

    // Reset video and card to original styles (the "normal size it was loaded with")
    function resetVideoSize(videoElement) {
        const card = videoElement.closest('.video-card');
        const videoContainer = videoElement.parentElement;

        // restore container padding-top (use stored computed value or default)
        if (videoContainer.dataset.origPaddingTop) {
            videoContainer.style.paddingTop = videoContainer.dataset.origPaddingTop;
        } else {
            videoContainer.style.paddingTop = '56.25%';
        }

        // restore card overflow and z-index
        card.style.overflow = card.dataset.origOverflow || 'hidden';
        card.style.zIndex = card.dataset.origZIndex || '';

        // restore video sizing and fit
        videoElement.style.objectFit = videoElement.dataset.origObjectFit || 'cover';
        videoElement.style.width = videoElement.dataset.origWidth || '100%';
        videoElement.style.height = videoElement.dataset.origHeight || '100%';
        videoElement.style.maxWidth = '';
        videoElement.style.maxHeight = '';
        videoElement.style.display = '';
        videoElement.style.margin = '';
        videoElement.style.position = '';
        videoElement.style.left = '';
        videoElement.style.transform = '';
    }

    // Show or hide the scroll to top button
    function toggleScrollToTopButton() {
        if (window.scrollY > 300) {
            scrollToTopButton.style.display = 'flex';
        } else {
            scrollToTopButton.style.display = 'none';
        }
    }

    // Scroll to top function
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>

</body>
</html>
