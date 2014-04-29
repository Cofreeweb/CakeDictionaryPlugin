<table>
  <tr ng-repeat="node in nodes">
    <td><a href="#dictionaries/edit/{{ node.Dictionary.node }}">{{ node.Dictionary.text }}</td>
  </tr>
</table>
<div class='paginate' paginate-pages='{{pages}}' current-page='current'></div>