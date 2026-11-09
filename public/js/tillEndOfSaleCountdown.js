(function () {
    if (document.querySelectorAll('onSaleCountdown')){
        const timeTillEndOfSale = document.querySelectorAll('onSaleCountdown');
        // Set the target date and time for the countdown
        

        // Update the countdown every second
        const countdown = setInterval(function() {
           
            // Display the countdown in the 'countdown' element
            Array.from(document.querySelectorAll('.onSaleCountdown')).forEach(function(e) {
                const time_till_sale = new Date(e.getAttribute("data-time")).getTime();
                // Get the current date and time
                const now = new Date().getTime();

                // Calculate the time difference
                const timeDifference = time_till_sale - now;

                // Calculate days, hours, minutes, and seconds
                const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                e.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                // If the countdown is over, display a message and stop the timer
                if (timeDifference <= 0) {
                    clearInterval(countdown);
                }
            });
        }, 1000); // Update every 1000 milliseconds (1 second)
    } 
 })();