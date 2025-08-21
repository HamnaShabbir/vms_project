import './bootstrap';
import Echo from 'laravel-echo';

window.Echo.channel('notifications')
    .listen('.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', (e) => {
        console.log('New visitor notification:', e);
        alert(e.message); // Show an alert or update the UI
    });