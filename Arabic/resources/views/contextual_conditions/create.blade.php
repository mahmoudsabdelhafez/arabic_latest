<div>
        <h3>Select a Tool:</h3>
        @foreach($linkingTools as $tool)
            <button class="tool-button" data-tool-name="{{ $tool->name }}">
                {{ $tool->name }}
            </button>
        @endforeach
    </div>

    <script>
        // When a tool name is clicked, redirect to show its table rows
        document.querySelectorAll('.tool-button').forEach(button => {
            button.addEventListener('click', function() {
                const toolName = this.getAttribute('data-tool-name');
                window.location.href = `/contextual_conditions/show-table/${toolName}`;
            });
        });
    </script>