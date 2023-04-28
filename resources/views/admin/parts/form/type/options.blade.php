<div class="">
  <div class="bg-white">
      <ol>
          @foreach($item->options as $option => $values)
              <li>{{ $option }}
                  <ol>
                      @foreach($values as $value)
                          <li>{{ $value->name }}</li>
                      @endforeach
                  </ol>
              </li>
          @endforeach
      </ol>
  </div>
</div>
