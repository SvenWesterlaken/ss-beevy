<% if $pageTypeName == 'HomePage' %>
<div class="header-menu">
<% else %>
<div class="header-menu black">
<% end_if %>
  <div class="header-logo" src="$BaseURL/images/svg/logo-white.svg">
    <a href="$AbsoluteBaseURL">
      <img class="header-logo" src="$BaseURL/images/svg/logo-white.svg">
    </a>
  </div>
  <div id="menu-button">
    <div class="image"></div>
  </div>
  <nav id="navigation">
    <ul>
      <% loop $Menu(1) %>
      <li>
        <a href="$Link" title="Go to the $Title page" class="$LinkingMode">$MenuTitle</a>
      </li>
      <% end_loop %>
    </ul>
  </nav>
</div>
