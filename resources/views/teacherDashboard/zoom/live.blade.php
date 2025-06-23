<x-teacher-panel>

    <div class="text-center">
        <h1 class="mb-4">Oxford Live Support</h1>
        <button onclick="startZoomMeeting()" class="btn btn-primary btn-lg">
            🚀 Start Zoom Meeting
        </button>
    </div>

    <script>
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute(
            'content');

        function startZoomMeeting() {
            axios.post('/dashboard/zoom/create', {
                    topic: 'Oxford Live Chat'
                })
                .then(response => {
                    if (response.data.success) {
                        const joinUrl = response.data.data.join_url;
                        window.open(joinUrl, '_blank');
                    } else {
                        alert('Zoom Error: ' + response.data.error.message);
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('حدث خطأ أثناء بدء الاجتماع');
                });
        }
    </script>

</x-teacher-panel>
