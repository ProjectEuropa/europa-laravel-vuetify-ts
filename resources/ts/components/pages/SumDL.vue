<template>
  <v-content>
    <v-container fluid>
      <h1 class="display-1 mb-4 text--darken-1">Sum DL {{capitalizeFirstLetter(searchType)}} Data</h1>
      <h4
        class="subheading"
      >{{ searchTypeJa }}データの一括ダウンロードが可能です。ダウンロードしたいデータにチェックを入れて一括ダウンロードボタンをクリックしてください。</h4>
      <v-form class="d-flex justify-md-space-center justify-sm-space-between">
        <v-text-field
          v-model="keyword"
          @keyup.enter="onClickSearch()"
          label="Solo"
          placeholder="keyword"
          solo
        ></v-text-field>
        <v-select :items="items" v-model="orderType" solo></v-select>
        <v-btn class="primary" @click="onClickSearch()">Search</v-btn>
      </v-form>
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">
                <v-checkbox label="全チェック"></v-checkbox>
              </th>
              <th class="text-left">オーナー名</th>
              <th class="text-left">コメント</th>
              <th class="text-left">ファイル名</th>
              <th class="text-left">アップロード日時</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in teams" :key="index">
              <td>
                <v-checkbox></v-checkbox>
              </td>
              <td>{{ item.upload_owner_name }}</td>
              <td style="white-space:pre-wrap; word-wrap:break-word;">{{ item.file_comment }}</td>
              <td>{{ item.file_name }}</td>
              <td>{{ item.created_at }}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-btn primary large block class="info">一括ダウンロード</v-btn>
      <v-pagination v-model="page" :length="pageLength"></v-pagination>
    </v-container>
    <v-overlay :value="overlay">
      <v-progress-circular color="primary" indeterminate size="64"></v-progress-circular>
    </v-overlay>
  </v-content>
</template>

<script lang="ts">
import { FileDataObject } from "../../vue-data-entity/FileDataObject";
import { SelectBoxTextValueObject } from "../../vue-data-entity/SelectBoxTextValueObject";
import { Vue, Component, Watch } from "vue-property-decorator";
import VueRouter from "vue-router";

Component.registerHooks(["beforeRouteUpdate"]);
@Component
export default class SumDLTeamData extends Vue {
  teams: Array<FileDataObject> = [];
  page: Number = 1;
  items: Array<SelectBoxTextValueObject> = [
    {
      text: "投稿日時の新しい順",
      value: "1"
    },
    {
      text: "投稿日時の古い順",
      value: "2"
    }
  ];
  itemDefault: string = "1";
  overlay: boolean = false;
  pageLength: number = 1;
  searchType: string = "";
  searchTypeJa: string = "";
  orderType: string | (string | null)[] = "1";
  keyword: string | (string | null)[] = "";

  /**
   * name
   */
  public capitalizeFirstLetter(str: string) {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }

  /**
   * name
   */
  public created() {
    this.searchType = this.$route.params.searchType;
    this.searchTypeJa = this.searchType === "team" ? "チーム" : "マッチ";
    this.search();
  }

  /**
   * watch
   */
  @Watch("page")
  onPageChanged() {
    this.$router.push({
      name: "SumDL",
      query: {
        page: this.page.toString(),
        keyword: this.keyword,
        orderType: this.orderType
      }
    });
  }
  /**
   * search
   */
  public onClickSearch() {
    this.$router.push({
      name: "SumDL",
      query: {
        keyword: this.keyword,
        orderType: this.orderType
      }
    });
  }

  /**
   * search
   */
  public search() {
    this.page = isNaN(Number(this.$route.query.page))
      ? 1
      : Number(this.$route.query.page);
    this.overlay = true;
    Vue.prototype.$http
      .get(
        `/api/sumDLSearch/${this.searchType}?page=${this.page}&keyword=${this.keyword}&orderType=${this.orderType}`
      )
      .then((res: any): void => {
        this.teams = res.data.data;
        this.pageLength = res.data.last_page;
        this.overlay = false;
      })
      .catch((error: any): void => {
        alert("検索実行時にエラーが発生しました");
        this.overlay = false;
      });
  }

  public beforeRouteUpdate(to: VueRouter, from: VueRouter, next: any) {
    next();
    this.searchType = this.$route.params.searchType;
    this.searchTypeJa = this.searchType === "team" ? "チーム" : "マッチ";
    this.search();
  }
}
</script>
