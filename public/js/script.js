// public/js/script.js
console.log('Custom script is loaded');

document.addEventListener('DOMContentLoaded', () => {
    // Get all rating elements
    const ratingElements = document.querySelectorAll('.rating-container');

    ratingElements.forEach(element => {
        const rating = parseInt(element.getAttribute('data-rating'), 10);

        if (isNaN(rating)) {
            console.error('Invalid rating value:', rating);
            return;
        }

        const stars = element.querySelectorAll('.star');

        function updateStars() {
            stars.forEach(star => {
                const value = parseInt(star.getAttribute('data-value'), 10);
                if (value <= rating) {
                    star.classList.add('filled');
                } else {
                    star.classList.remove('filled');
                }
            });
        }

        updateStars();
    });
});

//for like section 
document.addEventListener('DOMContentLoaded', function () {
    const likeButton = document.getElementById('like-button');
    const likeCount = document.getElementById('like-count');

    likeButton.addEventListener('click', function () {
        const blogId = this.getAttribute('data-blog-id');
        const isLiked = this.classList.contains('liked');
        const url = isLiked 
            ? `/blogs/${blogId}/unlike` 
            : `/blogs/${blogId}/like`;

        fetch(url, {
            method: isLiked ? 'DELETE' : 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.isLiked) {
                likeButton.classList.remove('unliked');
                likeButton.classList.add('liked');
            } else {
                likeButton.classList.remove('liked');
                likeButton.classList.add('unliked');
            }

            // Update like count
            likeCount.textContent = data.likes;

            // Optionally, update the text if you want to show a message
            if (data.isLiked) {
                likeCount.nextElementSibling.textContent = 'You and others liked this';
            } else {
                likeCount.nextElementSibling.textContent = '';
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

// for comment section 


document.addEventListener('DOMContentLoaded', function () {
    const commentBoxes = document.querySelectorAll('.comment-box');

    commentBoxes.forEach(box => {
        box.addEventListener('click', function (e) {
            const actions = this.querySelector('.comment-actions');
            const editForm = this.querySelector('.edit-comment-form');

            if (actions) {
                actions.classList.toggle('d-none'); // Toggle visibility of actions
            }
            
            if (e.target.closest('.edit-comment-btn')) {
                const commentId = e.target.closest('.edit-comment-btn').dataset.commentId;
                
                // Show the edit form and hide the comment content
                editForm.classList.remove('d-none');
                this.querySelector('.comment-content').classList.add('d-none');
            }
            
            if (e.target.closest('.cancel-edit-btn')) {
                // Hide the edit form and show the comment content
                editForm.classList.add('d-none');
                this.querySelector('.comment-content').classList.remove('d-none');
            }
        });
    });

    // Optionally, close actions and edit forms when clicking outside
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.comment-box')) {
            document.querySelectorAll('.comment-actions').forEach(actions => actions.classList.add('d-none'));
            document.querySelectorAll('.edit-comment-form').forEach(form => form.classList.add('d-none'));
            document.querySelectorAll('.comment-content').forEach(content => content.classList.remove('d-none'));
        }
    });
});

//scroll nav



let scrollTimeout; // Variable to store the timeout

window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');

    // Reduce opacity when scrolling
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }

    // Clear the timeout if the user keeps scrolling
    clearTimeout(scrollTimeout);

    // Set a timeout to check when scrolling stops (in milliseconds)
    scrollTimeout = setTimeout(function() {
        navbar.classList.remove('scrolled'); // Reset to solid color when scroll stops
    }, 300); // 300ms delay after scrolling stops
});

// hambargar menu 
document.getElementById('hamburger-menu').addEventListener('click', function() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('show');
});





// for porfile dropdwon 
$(document).ready(function() {
    // Toggle dropdown on user photo click
    $('#user-photo-container').on('click', function(event) {
        event.stopPropagation(); // Prevent this click from closing the dropdown
        var $dropdown = $('.user-dropdown-box');

        if ($dropdown.is(':visible')) {
            // If dropdown is visible, fade it out
            $dropdown.fadeOut(300).removeClass('show');
        } else {
            // If dropdown is hidden, fade it in
            $dropdown.fadeIn(300).addClass('show');
        }
    });

    // Close dropdown when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#user-photo-container, .user-dropdown-box').length) {
            $('.user-dropdown-box').fadeOut(300).removeClass('show');
        }
    });
});


// hero text animation 
$(document).ready(function() {
    // Initial setup - hide the text
    $('.hero-title').hide();
    $('.hero-text').hide();

    // Function to simulate typing effect
    function typeText(element, text, speed) {
        let i = 0;
        let interval = setInterval(function() {
            $(element).append(text.charAt(i)); // Append one character at a time
            i++;
            if (i === text.length) {
                clearInterval(interval); // Stop when the entire text is typed
            }
        }, speed); // Speed controls typing delay
    }

    // Start animations - fade in title and then the typing effect
    $('.hero-title').fadeIn(1000, function() {
        // Wait until title is fully visible, then show the hero text
        $('.hero-text').show();
        // Clear existing content and start typing effect
        let text = $('.hero-text').text(); // Store the full text
        $('.hero-text').text(''); // Clear the text initially
        typeText('.hero-text', text, 50); // Call typing effect function
    });
});

// admin dashboard show and hide menu
document.addEventListener('DOMContentLoaded', function () {
    const dashboardLink = document.getElementById('dashboardLink');
    const playersLink = document.getElementById('playersLink');
    const blogLink = document.getElementById('blogsLink');
    const videoLink = document.getElementById('videosLink');
    const teamLink = document.getElementById('teamsLink');
    const userLink = document.getElementById('usersLink');

    const dashboardContent = document.getElementById('dashboardContent');
    const playerListContent = document.getElementById('playerListContent');
    const blogListContent = document.getElementById('blogListContent');
    const videoListContent = document.getElementById('videoListContent');
    const teamListContent = document.getElementById('teamListContent');
    const userListContent = document.getElementById('userListContent');

    // When clicking the Players link, show the player list and hide the dashboard
    playersLink.addEventListener('click', function () {
        playerListContent.style.display = 'block';
        dashboardContent.style.display = 'none';
        blogListContent.style.display = 'none';
        videoListContent.style.display = 'none';
        teamListContent.style.display = 'none';
        userListContent.style.display = 'none';
        
    });

    // When clicking the Dashboard link, show the dashboard and hide the player list
    dashboardLink.addEventListener('click', function () {
        dashboardContent.style.display = 'block';
        playerListContent.style.display = 'none';
        blogListContent.style.display = 'none';
        videoListContent.style.display = 'none';
        teamListContent.style.display = 'none';
        userListContent.style.display = 'none';
    });

    //when clicking the blog link, show the blog and hide other content
    blogLink.addEventListener('click',function(){

        blogListContent.style.display = 'block';
        dashboardContent.style.display = 'none';
        playerListContent.style.display = 'none';
        videoListContent.style.display = 'none';
        teamListContent.style.display = 'none';
        userListContent.style.display = 'none';
    });

    videoLink.addEventListener('click',function(){

        videoListContent.style.display = 'block';
        dashboardContent.style.display = 'none';
        playerListContent.style.display = 'none';
        blogListContent.style.display = 'none';
        teamListContent.style.display = 'none';
        userListContent.style.display = 'none';
    });

    teamLink.addEventListener('click',function(){
        teamListContent.style.display = 'block';
        videoListContent.style.display = 'none';
        dashboardContent.style.display = 'none';
        playerListContent.style.display = 'none';
        blogListContent.style.display = 'none';
        userListContent.style.display = 'none';
    });

    userLink.addEventListener('click',function(){
        userListContent.style.display = 'block';
        teamListContent.style.display = 'none';
        videoListContent.style.display = 'none';
        dashboardContent.style.display = 'none';
        playerListContent.style.display = 'none';
        blogListContent.style.display = 'none';
        
    });
});



















